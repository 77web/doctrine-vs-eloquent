<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'books')]
class Book
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255, nullable: false)]
    private string $title;

    #[ORM\Column(type: 'integer')]
    private int $price;

    #[ORM\ManyToOne(targetEntity: Author::class)]
    #[ORM\JoinColumn(onDelete: 'CASCADE')]
    private Author $author;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description;

    #[ORM\OneToMany(mappedBy: 'book', targetEntity: Reaction::class, cascade: ['persist'], orphanRemoval: true)]
    private Collection $reactions;

    public function __construct()
    {
        $this->reactions = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function getAuthor(): Author
    {
        return $this->author;
    }

    public function setAuthor(Author $author): void
    {
        $this->author = $author;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return Collection<Reaction>
     */
    public function getReactions(): Collection
    {
        return $this->reactions;
    }

    public function setReactions(Collection $reactions): void
    {
        $this->reactions = $reactions;
    }

    public function addReaction(Reaction $reaction): void
    {
        if (!$this->reactions->contains($reaction)) {
            $reaction->setBook($this);
            $this->reactions->add($reaction);
        }
    }

    public function removeReaction(Reaction $reaction): void
    {
        $reaction->setBook(null);
        $this->reactions->removeElement($reaction);
    }
}
