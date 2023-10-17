<?php

namespace App\Entity;

use App\Repository\HaddockRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: HaddockRepository::class)]
#[ORM\Table(name: 'haddock')]
#[UniqueEntity(fields: ['insult'])]
class Haddock
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, length: 255, unique: true, nullable: false)]
    private ?string $insult = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInsult(): ?string
    {
        return $this->insult;
    }

    public function setInsult(string $insult): static
    {
        $this->insult = $insult;

        return $this;
    }
}
