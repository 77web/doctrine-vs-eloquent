<?php

declare(strict_types=1);

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

require __DIR__.'/../vendor/autoload.php';

// タイトルにSymfonyを含み、値段が2000,3000,4000円ぴったりである本
/** @var Collection<Book> $books1 */
$books1 = Book::query()
    ->where('title', 'like','%Symfony%')
    ->whereIn('price', [2000, 3000, 4000])
    ->get()
;

// タイトルにSymfonyを含み、説明がnullである本
/** @var Collection<Book> $books2 */
$books2 = Book::query()
    ->where('title', 'like','%Symfony%')
    ->whereNull('description')
    ->get()
;
