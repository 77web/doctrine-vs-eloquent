<?php

declare(strict_types=1);

use App\Entity\Author;
use Doctrine\ORM\EntityManagerInterface;

require __DIR__.'/../vendor/autoload.php';

/** @var EntityManagerInterface $entityManager */
$entityManager = require __DIR__.'/bootstrap.php';

/** @var Author[] $authors */
$authors = $entityManager->getRepository(Author::class)->findAll();

foreach ($authors as $author) {
    echo $author->getName().PHP_EOL;
    foreach ($author->getBooks() as $book) {
        echo $book->getTitle().PHP_EOL;
    }
}

// 実行されたSQLのログ
// doctrine.DEBUG: Executing query: {sql} {"sql":"SELECT t0.id AS id_1, t0.name AS name_2, t3.id AS id_4, t3.title AS title_5, t3.price AS price_6, t3.description AS description_7, t3.author_id AS author_id_8 FROM authors t0 LEFT JOIN books t3 ON t3.author_id = t0.id"} []
