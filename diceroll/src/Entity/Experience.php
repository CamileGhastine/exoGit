<?php

namespace App\Entity;

use App\Repository\ExperienceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'experience', targetEntity: DiceRoll::class, orphanRemoval: true)]
    private $diceRoll;

    public function __construct()
    {
        $this->diceRoll = new ArrayCollection();
    }

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

    /**
     * @return Collection|DiceRoll[]
     */
    public function getDiceRoll(): Collection
    {
        return $this->diceRoll;
    }

    public function addDiceRoll(DiceRoll $diceRoll): self
    {
        if (!$this->diceRoll->contains($diceRoll)) {
            $this->diceRoll[] = $diceRoll;
            $diceRoll->setExperience($this);
        }

        return $this;
    }

    public function removeDiceRoll(DiceRoll $diceRoll): self
    {
        if ($this->diceRoll->removeElement($diceRoll)) {
            // set the owning side to null (unless already changed)
            if ($diceRoll->getExperience() === $this) {
                $diceRoll->setExperience(null);
            }
        }

        return $this;
    }
}
