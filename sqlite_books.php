<?php

/** @var EntityManagerInterface $em */

use Doctrine\ORM\EntityManagerInterface;

require __DIR__.'/Doctrine/vendor/autoload.php';
$em = require __DIR__.'/Doctrine/Usecase/bootstrap.php';

$sqls = file_get_contents(__DIR__.'/sql/sqlite_books.sql');
foreach (explode(';', $sqls) as $sql) {
    $em->getConnection()->executeStatement($sql);
}

$conn = $em->getConnection();
for ($i = 1; $i <= 5; $i++) {
    $conn->insert('authors', ['id' => $i, 'name' => 'author'.$i]);
    for ($j = 1; $j <= 10; $j++) {
        $conn->insert('books', ['id' => $j, 'author_id' => $i, 'title' => 'book'.$j, 'description' => 'description'.$i, 'price' => 100 * $i * $j]);
    }
}
