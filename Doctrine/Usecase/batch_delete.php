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
foreach ($entityManager->getRepository(Book::class)->findAll() as $book) {
    $entityManager->remove($book);
}
$entityManager->flush(); // begin + 全件のdelete + commitがここで行われる

// エンティティを使えないぐらい多い件数を扱う場合
$conn = $entityManager->getConnection();
$conn->beginTransaction();
for ($i = 1; $i <= 1000000; $i++) {
    $conn->delete('books', ['id' => $i]);
}
$conn->commit();

