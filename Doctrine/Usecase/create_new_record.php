<?php

declare(strict_types=1);

use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;

require __DIR__.'/../vendor/autoload.php';

$newBook = new Book();
$newBook->setTitle('ちょうぜつソフトウェア設計入門');

/** @var EntityManagerInterface $entityManager */
$entityManager = require __DIR__.'/bootstrap.php';
$entityManager->persist($newBook);
$entityManager->flush();
