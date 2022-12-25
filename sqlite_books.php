<?php

/** @var EntityManagerInterface $em */

use Doctrine\ORM\EntityManagerInterface;

require __DIR__.'/Doctrine/vendor/autoload.php';
@unlink(__DIR__.'/Doctrine/db.sqlite');

$em = require __DIR__.'/Doctrine/Usecase/bootstrap.php';

$sqls = file_get_contents(__DIR__.'/sql/sqlite_books.sql');
foreach (explode(';', $sqls) as $sql) {
    $em->getConnection()->executeStatement($sql);
}

$conn = $em->getConnection();
$now = date('Y-m-d H:i:s');
for ($i = 1; $i <= 5; $i++) {
    $conn->insert('authors', ['id' => $i, 'name' => 'author' . $i]);
    for ($j = 1; $j <= 10; $j++) {
        $conn->insert('books', ['id' => $i * 10 + $j, 'author_id' => $i, 'title' => 'book' . $j, 'description' => 'description' . $j, 'price' => 100 * $i * $j, 'updated_at' => $now, 'created_at' => $now]);
    }
}
