<?php

declare(strict_types=1);

use App\Models\Author;
use App\Models\Book;
use App\Models\Like;

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/bootstrap.php';

/** @var Book $book1 */
$book1 = Book::find(11);
$like1 = new Like();
$book1->likes()->save($like1);
/** @var Author $author1 */
$author1 = Author::find(1);
$like2 = new Like();
$author1->likes()->save($like2);

$book1->refresh();
echo count($book1->likes).PHP_EOL; // like1件

$author1->refresh();
echo count($author1->likes).PHP_EOL; // like1件
