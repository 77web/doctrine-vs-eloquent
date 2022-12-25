<?php

declare(strict_types=1);

use App\Models\Author;
use App\Models\Book;

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/bootstrap.php';

$author = new Author();
$author->name = 'tanakahisateru';
$author->save();
$newBook = new Book();
$newBook->title = 'ちょうぜつソフトウェア設計入門';
$newBook->price = 3080;
$newBook->description = 'かわいい絵柄で釣ってオブジェクト指向をガッツリ解説する本';
$newBook->author_id = $author->id;
$newBook->save();

$newBook->created_at; // 登録日時がセットされている
$newBook->updated_at; // 更新日時がセットされている

