<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(readOnly: true)]
#[ORM\Table(name: 'author_stat')]
class AuthorStat
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\Column(type: 'string')]
    private ?string $name;

    #[ORM\Column(name: 'books_count', type: 'integer')]
    private ?int $booksCount;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getBooksCount(): ?int
    {
        return $this->booksCount;
    }

    public function setBooksCount(?int $booksCount): void
    {
        $this->booksCount = $booksCount;
    }
}
