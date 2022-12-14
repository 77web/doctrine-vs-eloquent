<?php

declare(strict_types=1);

use App\Models\Book;
use Illuminate\Support\Facades\DB;

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/bootstrap.php';

// insert
DB::beginTransaction();
for ($i = 1; $i <= 100000; $i++) {
    Book::query()->insert(['title' => sprintf('title%d', $i), 'price' => $i * 100]);
}
DB::commit();

// update
DB::beginTransaction();
for ($i = 1; $i <= 100000; $i++) {
    DB::update(
        'UPDATE books SET title = ?, price = ? WHERE id = ?',
        [
            sprintf('title%d', $i),
            $i * 200,
            $i,
        ]
    );
}
DB::commit();
