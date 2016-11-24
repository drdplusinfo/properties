<?php
namespace DrdPlus\Properties\Combat;

use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Combat\Partials\CombatGameCharacteristic;
use DrdPlus\Tools\Calculations\SumAndRound;

/**
 * @method DefenseNumber add(int|IntegerInterface $value)
 * @method DefenseNumber sub(int|IntegerInterface $value)
 */
class DefenseNumber extends CombatGameCharacteristic
{

    /**
     * @param Agility $agility
     */
    public function __construct(Agility $agility)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        parent::__construct(SumAndRound::ceiledHalf($agility->getValue()));
    }

}