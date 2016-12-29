<?php
namespace DrdPlus\Properties\Combat;

use DrdPlus\Properties\Base\Knack;
use DrdPlus\Properties\Combat\Partials\CombatGameCharacteristic;
use DrdPlus\Calculations\SumAndRound;

/**
 * @method Shooting add(int|IntegerInterface $value)
 * @method Shooting sub(int|IntegerInterface $value)
 */
class Shooting extends CombatGameCharacteristic
{
    /**
     * @param Knack $knack
     */
    public function __construct(Knack $knack)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        parent::__construct(SumAndRound::flooredHalf($knack->getValue()));
    }
}