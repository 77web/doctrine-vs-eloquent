<?php

declare(strict_types=1);

use App\Entity\Author;
use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;

require __DIR__.'/../vendor/autoload.php';

/** @var EntityManagerInterface $entityManager */
$entityManager = require __DIR__.'/bootstrap.php';

$author = new Author();
$author->setName('tanakahisateru');
$newBook = new Book();
$newBook->setTitle('ちょうぜつソフトウェア設計入門');
$newBook->setPrice(3080);
$newBook->setDescription('かわいい絵柄で釣ってオブジェクト指向をガッツリ解説する本');
$newBook->setAuthor($author);

/** @var EntityManagerInterface $entityManager */
$entityManager = require __DIR__.'/bootstrap.php';
$entityManager->persist($author);
$entityManager->persist($newBook);
$entityManager->flush();

$newBook->getCreatedAt(); // 登録日時
$newBook->getUpdatedAt(); // 更新日時
