<?php
namespace DrdPlus\Properties\Combat;

use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Combat\Partials\CombatGameCharacteristic;
use DrdPlus\Calculations\SumAndRound;
use Granam\Integer\IntegerInterface;

/**
 * @method Attack add(int|IntegerInterface $value)
 * @method Attack sub(int|IntegerInterface $value)
 */
class Attack extends CombatGameCharacteristic
{

    /**
     * @param Agility $agility
     */
    public function __construct(Agility $agility)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        parent::__construct(SumAndRound::flooredHalf($agility->getValue()));
    }

}