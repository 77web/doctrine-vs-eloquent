<?php

declare(strict_types=1);

use App\Entity\Author;
use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;

require __DIR__.'/../vendor/autoload.php';

/** @var EntityManagerInterface $entityManager */
$entityManager = require __DIR__.'/bootstrap.php';

$book1 = $entityManager->getRepository(Book::class)->find(1);
echo $book1->getAuthor()->getName(); // Authorのnameを見ることができる

$author1 = $entityManager->getRepository(Author::class)->find(1);
// $author1の著作タイトルをすべて表示
foreach ($author1->getBooks() as $book) {
    echo $book->getTitle().PHP_EOL;
}
