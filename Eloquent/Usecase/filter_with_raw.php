<?php

declare(strict_types=1);

use App\Models\Author;
use Illuminate\Database\Eloquent\Collection;

require __DIR__.'/../vendor/autoload.php';

/** @var Collection<Author> $authors1 */
$authors = Author::query()->leftJoin('books', 'books.author_id', 'authors.id')->havingRaw('count(books.id) > 0')->get();
