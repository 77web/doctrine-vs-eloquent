<?php

declare(strict_types=1);

use App\Models\Author;
use Illuminate\Database\Eloquent\Collection;

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/bootstrap.php';

/** @var Collection<Author> $authors1 */
$authors = Author::query()->leftJoin('books', 'books.author_id', 'authors.id')
    ->select('authors.id')
    ->selectRaw('sum(books.price) as price_sum')
    ->get()
;
// $authorsはattributeとしてidとprice_sumのみを持つAuthorモデルのインスタンス
