<?php

declare(strict_types=1);

use App\Models\Book;

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/bootstrap.php';

$books1 = Book::query()
    ->where('price', '<', 5000)
    ->where('title', 'Symfony')
    ->get()
;
