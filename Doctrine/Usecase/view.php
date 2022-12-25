<?php

declare(strict_types=1);

use App\Entity\AuthorStat;
use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;

require __DIR__.'/../vendor/autoload.php';

/** @var EntityManagerInterface $entityManager */
$entityManager = require __DIR__.'/bootstrap.php';

/** @var AuthorStat[] $stats */
$stats = $entityManager->getRepository(AuthorStat::class)->findAll();
foreach ($stats as $stat) {
    echo sprintf('%s(%d)', $stat->getName(), $stat->getBooksCount()).PHP_EOL;
}

