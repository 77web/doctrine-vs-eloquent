<?php

declare(strict_types=1);

use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;

require __DIR__.'/../vendor/autoload.php';

/** @var EntityManagerInterface $entityManager */
$entityManager = require __DIR__.'/bootstrap.php';

// priceが5000円未満でタイトルがSymfonyの本のリスト
/** @var array<Book> $books1 */
$books1 = $entityManager->getRepository(Book::class)
    ->createQueryBuilder('b') // aliasは何を設定しても良い
    ->where('b.price < :max_price')
    ->andWhere('b.title = :title_symfony')
    ->setParameter('max_price', 5000)
    ->setParameter('title_symfony', 'Symfony')
    ->getQuery()
    ->getResult()
;
