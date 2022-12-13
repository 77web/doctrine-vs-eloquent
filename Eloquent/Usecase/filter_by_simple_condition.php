<?php

declare(strict_types=1);

use App\Models\Book;

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/bootstrap.php';

// priceが1000円の本をすべて取得
$books = Book::where('price', 1000)->get();

// priceが5000円の本を1冊取得
$book = Book::where('price', 5000)->first();
