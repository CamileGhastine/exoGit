<?php

namespace App\Service\CombinaisonCalculator;

use App\Entity\Experience;

interface CombinaisonCalculator
{
    public function calcul(Experience $experience, int $number1): int;
}