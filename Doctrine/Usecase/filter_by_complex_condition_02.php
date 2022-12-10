<?php

declare(strict_types=1);

use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;

require __DIR__.'/../vendor/autoload.php';

/** @var EntityManagerInterface $entityManager */
$entityManager = require __DIR__.'/bootstrap.php';

// タイトルにSymfonyを含み、値段が2000,3000,4000円ぴったりである本
$qb1 = $entityManager->getRepository(Book::class)
    ->createQueryBuilder('b');
$exprHelper1 = $qb1->expr();
/** @var array<Book> $books1 */
$books1 = $qb1
    ->where($exprHelper1->like('b.title', ':title_symfony'))
    ->andWhere($exprHelper1->in('b.price', ':price_list'))
    ->setParameter('title_symfony', '%Symfony%')
    ->setParameter('price_list', [2000, 3000, 4000])
    ->getQuery()
    ->getResult()
;

// タイトルにSymfonyを含み、説明がnullである本
$qb2 = $entityManager->getRepository(Book::class)
    ->createQueryBuilder('b');
$exprHelper2 = $qb2->expr();
/** @var array<Book> $books2 */
$books2 = $qb2
    ->where($exprHelper2->like('b.title', ':title_symfony'))
    ->andWhere($exprHelper2->isNull('b.description'))
    ->setParameter('title_symfony', '%Symfony%')
    ->getQuery()
    ->getResult()
;
