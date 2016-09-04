<?php
namespace DrdPlus\Properties\Combat;

use DrdPlus\Properties\Body\Size;
use DrdPlus\Tools\Calculations\SumAndRound;

class DefenseAgainstShooting extends CombatGameCharacteristic
{
    /**
     * Despite rules this library deducts half of size from defense number, instead of adding to attack number,
     * because it is more practical from numbers-point-of-view
     * PPH page 104 right column top
     *
     * @param DefenseNumber $defense
     * @param Size $size
     */
    public function __construct(DefenseNumber $defense, Size $size)
    {
        parent::__construct($defense->getValue() - SumAndRound::half($size->getValue()));
    }
}