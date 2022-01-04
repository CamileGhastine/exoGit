<?php

namespace App\Entity;

use App\Repository\ExperienceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExperienceRepository::class)]
class Experience
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $numberOfThrow;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumberOfThrow(): ?int
    {
        return $this->numberOfThrow;
    }

    public function setNumberOfThrow(int $numberOfThrow): self
    {
        $this->numberOfThrow = $numberOfThrow;

        return $this;
    }
}
