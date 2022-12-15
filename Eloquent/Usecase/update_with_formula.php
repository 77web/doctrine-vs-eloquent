<?php

declare(strict_types=1);

use App\Models\Book;

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/bootstrap.php';

$q = Book::query();
$q->update(['price' => $q->raw('price * 1.1')]);
