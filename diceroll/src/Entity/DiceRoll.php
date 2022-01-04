<?php

namespace App\Entity;

use App\Repository\DiceRollRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiceRollRepository::class)]
class DiceRoll
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $dice1;

    #[ORM\Column(type: 'integer')]
    private $dice2;

    #[ORM\Column(type: 'integer')]
    private $dice3;

    #[ORM\ManyToOne(targetEntity: Experience::class, inversedBy: 'diceRoll')]
    #[ORM\JoinColumn(nullable: false)]
    private $experience;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDice1(): ?int
    {
        return $this->dice1;
    }

    public function setDice1(int $dice1): self
    {
        $this->dice1 = $dice1;

        return $this;
    }

    public function getDice2(): ?int
    {
        return $this->dice2;
    }

    public function setDice2(int $dice2): self
    {
        $this->dice2 = $dice2;

        return $this;
    }

    public function getDice3(): ?int
    {
        return $this->dice3;
    }

    public function setDice3(int $dice3): self
    {
        $this->dice3 = $dice3;

        return $this;
    }

    public function getExperience(): ?Experience
    {
        return $this->experience;
    }

    public function setExperience(?Experience $experience): self
    {
        $this->experience = $experience;

        return $this;
    }
}
