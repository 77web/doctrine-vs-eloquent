<?php

declare(strict_types=1);

use App\Entity\Author;
use App\Fixtures\AuthorLoader;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManagerInterface;

require __DIR__.'/../vendor/autoload.php';

/** @var EntityManagerInterface $entityManager */
$entityManager = require __DIR__.'/bootstrap.php';

$loader = new Loader();
$loader->addFixture(new AuthorLoader());
$executor = new ORMExecutor($entityManager, new ORMPurger($entityManager));
$executor->execute($loader->getFixtures());

$entityManager->getRepository(Author::class)->findAll(); // 5件登録されている
