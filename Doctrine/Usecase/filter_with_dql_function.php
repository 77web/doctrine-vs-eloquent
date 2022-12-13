<?php

declare(strict_types=1);

use App\Entity\Author;
use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\ResultSetMapping;

require __DIR__.'/../vendor/autoload.php';

/** @var EntityManagerInterface $entityManager */
$entityManager = require __DIR__.'/bootstrap.php';

$qb = $entityManager->getRepository(Book::class)->createQueryBuilder('b');
/** @var array<array{id: int, price_sum: int}> $rows */
$rows = $qb->leftJoin('b.author', 'a') // 第一引数はエンティティのフィールド名. エンティティ上でリレーションを定義してあればjoin条件は記述不要
    ->select('a.id, sum(b.price) as price_sum')
    ->groupBy('a.id')
    ->getQuery()
    ->getResult()
;
