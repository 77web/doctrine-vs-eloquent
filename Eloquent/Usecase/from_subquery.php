<?php

declare(strict_types=1);

use App\Models\Author;
use Illuminate\Database\Eloquent\Collection;

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/bootstrap.php';

$subQuery = <<<EOQ
select authors.id, authors.name, count(books.id) as books_count from authors left join books on books.author_id = authors.id group by authors.id, authors.name
EOQ;

/** @var Collection<Author> $result */
$result = Author::query()->fromSub($subQuery, 't')->select('t.name', 't.books_count')->get();
foreach ($result as $author) {
    // books_countはAuthorのプロパティではないが、Author::query()で始めたのでAuthorにマップされている
    echo sprintf('%s(%d)', $author->name, $author->books_count).PHP_EOL;
}
