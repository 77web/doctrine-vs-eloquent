<?php

declare(strict_types=1);

use App\Entity\Author;
use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\ResultSetMapping;

require __DIR__.'/../vendor/autoload.php';

/** @var EntityManagerInterface $entityManager */
$entityManager = require __DIR__.'/bootstrap.php';

/** @var array<array{id: int, name: string}> $rows */
$rows = $entityManager->getConnection()->fetchAllAssociative('SELECT id, name FROM authors UNION SELECT id, title FROM books');
