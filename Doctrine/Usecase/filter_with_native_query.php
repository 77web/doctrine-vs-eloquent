<?php

declare(strict_types=1);

use App\Entity\Author;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\ResultSetMapping;

require __DIR__.'/../vendor/autoload.php';

/** @var EntityManagerInterface $entityManager */
$entityManager = require __DIR__.'/bootstrap.php';

$sql = <<<EOQ
SELECT a.id, a.name FROM authors AS a LEFT JOIN books AS b ON b.author_id = a.id GROUP BY a.name HAVING count(b.id) > 1
EOQ;


$rsm = new ResultSetMapping();
$rsm->addEntityResult(Author::class, 'a');
$rsm->addFieldResult('a', 'name', 'name');
$rsm->addFieldResult('a', 'id', 'id');

// 1冊以上本を書いている著者
$query = $entityManager->createNativeQuery($sql, $rsm);

/** @var array<Author> $authors */
$authors = $query->getResult();

// 別解としてDBALを使う方法
$rows = $entityManager->getConnection()->fetchAllAssociative($sql);
$ids = array_column($rows, 'id');
$qb = $entityManager->getRepository(Author::class)->createQueryBuilder('a');
$authors = $qb->where($qb->expr()->in('a.id', ':filtered_ids'))
    ->setParameter('filtered_ids', $ids)
    ->getQuery()
    ->getResult()
;
