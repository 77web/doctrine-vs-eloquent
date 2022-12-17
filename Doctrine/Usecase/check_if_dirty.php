<?php

declare(strict_types=1);

use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;

require __DIR__.'/../vendor/autoload.php';

/** @var EntityManagerInterface $entityManager */
$entityManager = require __DIR__.'/bootstrap.php';

$book1 = $entityManager->getRepository(Book::class)->find(1);
$book1->setTitle('Symfony6 The Fast Track');

$entityManager->getUnitOfWork()->computeChangeSets();
if ($entityManager->getUnitOfWork()->isEntityScheduled($book1)) {
    echo 'dirty!'.PHP_EOL;
} else {
    echo 'not dirty!'.PHP_EOL;
}

