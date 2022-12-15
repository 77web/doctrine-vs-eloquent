<?php

declare(strict_types=1);

use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;

require __DIR__.'/../vendor/autoload.php';

/** @var EntityManagerInterface $entityManager */
$entityManager = require __DIR__.'/bootstrap.php';

$qb = $entityManager->getRepository(Book::class)->createQueryBuilder('b');
$qb->update()->set('b.price', 'b.price * 1.1')->getQuery()->execute();
