<?php

declare(strict_types=1);

use App\Models\Author;

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/bootstrap.php';

$author = Author::factory()->create();
