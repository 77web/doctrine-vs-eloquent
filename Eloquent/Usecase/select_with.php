<?php

declare(strict_types=1);

use App\Models\Author;

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/bootstrap.php';

$authors = Author::with('books')->get();
foreach ($authors as $author) {
    echo $author->name.PHP_EOL;
    foreach ($author->books as $book) {
        echo $book->title.PHP_EOL;
    }
}
