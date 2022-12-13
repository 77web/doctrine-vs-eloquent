<?php

declare(strict_types=1);

use App\Models\Book;

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/bootstrap.php';

$book1 = Book::find(1);
