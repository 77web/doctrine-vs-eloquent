<?php

require 'vendor/autoload.php';

use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\DependencyFactory;

$migrationConfig = new PhpFile('migrations.php');
$entityManager = require __DIR__.'/Usecase/bootstrap.php';

return DependencyFactory::fromEntityManager($migrationConfig, new ExistingEntityManager($entityManager));
