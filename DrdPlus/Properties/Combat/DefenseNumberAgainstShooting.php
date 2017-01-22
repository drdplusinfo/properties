<?php
namespace DrdPlus\Properties\Combat;

use DrdPlus\Properties\Body\Size;
use DrdPlus\Properties\Combat\Partials\CombatCharacteristic;
use DrdPlus\Calculations\SumAndRound;

/**
 * @method DefenseNumberAgainstShooting add(int | IntegerInterface $value)
 * @method DefenseNumberAgainstShooting sub(int | IntegerInterface $value)
 */
class DefenseNumberAgainstShooting extends CombatCharacteristic
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
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        parent::__construct($defense->getValue() - SumAndRound::half($size->getValue()));
    }
}