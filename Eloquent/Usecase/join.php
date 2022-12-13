<?php

declare(strict_types=1);

use App\Models\Author;
use App\Models\Book;

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/bootstrap.php';

$book1 = Book::find(1);
echo $book1->author->name; // Authorのnameを見ることができる

$author1 = Author::find(1);
// $author1の著作タイトルをすべて表示
foreach ($author1->books as $book) {
    echo $book->title.PHP_EOL;
}
