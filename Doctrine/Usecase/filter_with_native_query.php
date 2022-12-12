<?php

declare(strict_types=1);

use App\Entity\Author;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\ResultSetMapping;

require __DIR__.'/../vendor/autoload.php';

/** @var EntityManagerInterface $entityManager */
$entityManager = require __DIR__.'/bootstrap.php';

$rsm = new ResultSetMapping();
$rsm->addEntityResult(Author::class, 'a');
$rsm->addFieldResult('a', 'name', 'name');
$rsm->addFieldResult('a', 'id', 'id');

// 1冊以上本を書いている著者
$query = $entityManager->createNativeQuery('SELECT a.id, a.name FROM authors AS a LEFT JOIN books AS b ON b.author_id = a.id GROUP BY a.name HAVING count(b.id) > 1', $rsm);

/** @var array<Author> $authors */
$authors = $query->getResult();
