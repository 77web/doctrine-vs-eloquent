<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Like extends Reaction
{
    public function getType(): string
    {
        return 'like';
    }
}
