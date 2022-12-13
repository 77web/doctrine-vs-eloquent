<?php

declare(strict_types=1);

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/bootstrap.php';

/** @var Collection<Author> $authors */
$authors = Author::query()
    ->select('id', 'name')
    ->union(Book::query()->select('id', 'title'))
    ->get()
;
// $authorsにはid, nameのみを持つAuthorモデルのインスタンスと、booksテーブルのid, title(nameという名前で収納される）を持つAuthorモデルのインスタンスが混在したコレクション
