<?php

declare(strict_types=1);

use App\Entity\Author;
use App\Entity\Book;
use App\Entity\Like;
use App\Entity\Sad;
use Doctrine\ORM\EntityManagerInterface;

require __DIR__.'/../vendor/autoload.php';

/** @var EntityManagerInterface $entityManager */
$entityManager = require __DIR__.'/bootstrap.php';
$author = new Author();
$author->setName('tanakahisateru');
$book = new Book();
$book->setTitle('ちょうぜつソフトウェア設計入門');
$book->setAuthor($author);
$book->setPrice(3080);
$book->setDescription('可愛い表紙で釣ってオブジェクト指向をガッツリ解説する本');
$book->addReaction(new Like());
$book->addReaction(new Sad());
$book->addReaction(new Like());

$entityManager->persist($author);
$entityManager->persist($book);
$entityManager->flush();

$entityManager->refresh($book);
echo $book->getReactions()->count().PHP_EOL; // 3件
echo $book->getReactions()[0]->getType().PHP_EOL; // Likeのインスタンス
echo $book->getReactions()[1]->getType().PHP_EOL; // Sadのインスタンス
