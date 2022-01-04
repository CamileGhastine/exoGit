<?php

namespace App\Service\CombinaisonCalculator;

use App\Entity\Experience;


class ThreeOfAKind implements CombinaisonCalculator
{
    public function calcul(Experience $experience, int $number) : int {

        $dicerolls = $experience->getDiceRoll();
        $counter = 0;
        
        for ($i=0 ; $i<count($dicerolls) ; $i++) {
            $diceroll = $dicerolls[$i]->getDice1().$dicerolls[$i]->getDice2().$dicerolls[$i]->getDice3();
            if($diceroll == $number) $counter++;
        };

        return $counter;
    }
}