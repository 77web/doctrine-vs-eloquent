<?php

declare(strict_types=1);

use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;

require __DIR__.'/../vendor/autoload.php';

/** @var EntityManagerInterface $entityManager */
$entityManager = require __DIR__.'/bootstrap.php';

// priceが1000円の本をすべて取得
$books = $entityManager->getRepository(Book::class)->findBy([
    'price' => 1000,
]);

// priceが5000円の本を1冊取得
$book = $entityManager->getRepository(Book::class)->findOneBy([
    'price' => 5000,
]);
