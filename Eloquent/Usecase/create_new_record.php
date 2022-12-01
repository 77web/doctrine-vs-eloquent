<?php

declare(strict_types=1);

use App\Models\Book;

require __DIR__.'/../vendor/autoload.php';

$newBook = new Book();
$newBook->title = 'ちょうぜつソフトウェア設計入門';
$newBook->save();
