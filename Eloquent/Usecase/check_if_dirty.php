<?php

declare(strict_types=1);

use App\Models\Book;

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/bootstrap.php';

/** @var Book $book1 */
$book1 = Book::find(1);
$book1->title = 'Symfony6 The Fast Track';

if ($book1->isDirty()) {
    echo 'dirty!'.PHP_EOL;
} else {
    echo 'not dirty!'.PHP_EOL;
}
