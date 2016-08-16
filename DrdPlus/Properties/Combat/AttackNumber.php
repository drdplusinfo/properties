<?php
namespace DrdPlus\Properties\Combat;

use DrdPlus\Properties\Base\Agility;
use DrdPlus\Tools\Calculations\SumAndRound;

class AttackNumber extends CombatGameCharacteristic
{

    /**
     * @param Agility $agility
     */
    public function __construct(Agility $agility)
    {
        parent::__construct(SumAndRound::flooredHalf($agility->getValue()));
    }

}