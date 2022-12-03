<?php

declare(strict_types=1);

use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;

require __DIR__.'/../vendor/autoload.php';

/** @var EntityManagerInterface $entityManager */
$entityManager = require __DIR__.'/bootstrap.php';

$book1 = $entityManager->getRepository(Book::class)->find(1);
$book1->setTitle('Symfony6 The Fast Track');

$entityManager->flush();
