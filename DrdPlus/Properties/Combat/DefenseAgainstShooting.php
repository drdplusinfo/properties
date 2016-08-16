<?php
namespace DrdPlus\Properties\Combat;

use DrdPlus\Properties\Body\Size;
use DrdPlus\Tools\Calculations\SumAndRound;

class DefenseAgainstShooting extends CombatGameCharacteristic
{
    /**
     * @param DefenseNumber $defense
     * @param Size $size
     */
    public function __construct(DefenseNumber $defense, Size $size)
    {
        parent::__construct($defense->getValue() + SumAndRound::half($size->getValue()));
    }
}