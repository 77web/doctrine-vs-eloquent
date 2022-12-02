<?php

declare(strict_types=1);

use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;

require __DIR__.'/../vendor/autoload.php';

/** @var EntityManagerInterface $entityManager */
$entityManager = require __DIR__.'/bootstrap.php';

// id=1のbookを取得
$book1 = $entityManager->getRepository(Book::class)->find(1);

// この書き方でも良い（shortcut）
$book1 = $entityManager->find(Book::class, 1);
