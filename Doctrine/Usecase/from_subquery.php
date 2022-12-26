<?php

declare(strict_types=1);

use Doctrine\ORM\EntityManagerInterface;

require __DIR__.'/../vendor/autoload.php';

/** @var EntityManagerInterface $entityManager */
$entityManager = require __DIR__.'/bootstrap.php';

$sql = <<<EOQ
SELECT t.name, t.books_count FROM (select authors.id, authors.name, count(books.id) as books_count from authors left join books on books.author_id = authors.id group by authors.id, authors.name) as t
EOQ;

/** @var array<array{name: string, books_count: int}> $rows */
$rows = $entityManager->getConnection()->fetchAllAssociative($sql);
foreach ($rows as $row) {
    echo sprintf('%s(%d)', $row['name'], $row['books_count']).PHP_EOL;
}
