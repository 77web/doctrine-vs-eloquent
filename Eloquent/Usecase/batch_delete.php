<?php

declare(strict_types=1);

use App\Models\Book;
use Illuminate\Support\Facades\DB;

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/bootstrap.php';

DB::beginTransaction();
for ($i = 1; $i <= 100000; $i++) {
    DB::delete('DELETE FROM books WHERE id = ?', [$i]);
}
DB::commit();
