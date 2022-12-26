<?php

declare(strict_types=1);

namespace App\Fixtures;

use App\Entity\Author;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AuthorLoader implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 5; $i++) {
            $author = new Author();
            $author->setName('author'.$i);
            $manager->persist($author);
        }
        $manager->flush();
    }
}
