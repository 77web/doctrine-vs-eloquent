<?php

declare(strict_types=1);

use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;

require __DIR__.'/../vendor/autoload.php';

$newBook = new Book();
$newBook->setTitle('Symfony6 The Fast Track');

/** @var EntityManagerInterface $entityManager */
$entityManager = require __DIR__.'/bootstrap.php';
$entityManager->persist($newBook);
$entityManager->flush();
