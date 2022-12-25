<?php

declare(strict_types=1);

use App\Entity\Author;
use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;

require __DIR__.'/../vendor/autoload.php';

/** @var EntityManagerInterface $entityManager */
$entityManager = require __DIR__.'/bootstrap.php';

$book = $entityManager->find(Book::class, 11);
$entityManager->remove($book);
$entityManager->flush(); // DELETE FROM booksでなくUPDATE books set deleted_at = now() が発行される
