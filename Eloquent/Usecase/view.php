<?php

declare(strict_types=1);

use App\Models\AuthorStat;

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/bootstrap.php';

/** @var AuthorStat[] $stats */
$stats = AuthorStat::all();
foreach ($stats as $stat) {
    echo sprintf('%s(%d)', $stat->name, $stat->books_count).PHP_EOL;
}
