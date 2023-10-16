<?php

namespace App\Entity;

use App\Repository\HaddockRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HaddockRepository::class)]
class Haddock
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique: true, nullable: false)]
    private ?string $insult = null;

    #[ORM\Column(nullable: false)]
    private ?int $used_count = null;

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

    public function getUsedCount(): ?int
    {
        return $this->used_count;
    }

    public function setUsedCount(int $used_count): static
    {
        $this->used_count = $used_count;

        return $this;
    }
}
