<?php

declare(strict_types=1);

use App\Entity\Author;
use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\ResultSetMapping;

require __DIR__.'/../vendor/autoload.php';

/** @var EntityManagerInterface $entityManager */
$entityManager = require __DIR__.'/bootstrap.php';

// エンティティを使ってやる
for ($i = 1; $i <= 100; $i++) {
    $book = new Book();
    $book->setTitle(sprintf('title%d', $i));
    $book->setPrice(100 * $i);
    $entityManager->persist($book);
}
$entityManager->flush(); // begin + 100件のinsert + commitがここで行われる

// エンティティを使えないぐらい多い件数を扱う場合
$conn = $entityManager->getConnection();
$conn->beginTransaction();
for ($i = 1; $i <= 1000000; $i++) {
    $conn->insert('books', [
        'title' => sprintf('title%d', $i),
        'price' => $i * 10,
    ]);
}
$conn->commit();

// updateもできる
$conn->beginTransaction();
for ($i = 1; $i <= 1000000; $i++) {
    $conn->update('books', [
        'price' => $i * 20,
    ], ['id' => $i]);
}
$conn->commit();
