<?php

namespace App\Service;

use App\Entity\DiceRoll;
use App\Entity\Experience;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\CombinaisonCalculator\CombinaisonCalculator;

class ExperienceMaker
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em =  $em;
    }

    public function throwDices(int $numberOfThrow) : Experience 
    {
        $experience = new Experience();
        $experience->setNumberOfThrow($numberOfThrow);

        for($i=1; $i<=$numberOfThrow; $i++) {

            $diceRoll = new DiceRoll;

            for ($j=1; $j<=3; $j++) {
                $dice = "setDice" . $j;
                $diceRoll->$dice(rand(1,6));
            }

            $experience->addDiceRoll($diceRoll);
            $this->em->persist($diceRoll);
        }

        $this->em->persist($experience);
        $this->em->flush();

        return $experience;
    }

}