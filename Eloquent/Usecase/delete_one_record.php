<?php

declare(strict_types=1);

use App\Models\Book;

require __DIR__.'/../vendor/autoload.php';

$book1 = Book::find(1);
$book1->delete();
