<?php

declare(strict_types=1);

use App\Models\Book;

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/bootstrap.php';

$book = Book::find(11);
$book->delete(); // DELETE FROM booksでなくUPDATE books set deleted_at = now() が発行される
