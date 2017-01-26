<?php
namespace DrdPlus\Properties\Combat;

use DrdPlus\Codes\CombatCharacteristicCode;
use DrdPlus\Properties\Base\Agility;
use DrdPlus\Calculations\SumAndRound;
use DrdPlus\Properties\Combat\Partials\CombatCharacteristic;

/**
 * See PPH page 34 left column, @link https://pph.drdplus.jaroslavtyc.com/#tabulka_bojovych_charakteristik
 * Defense can change only with Agility.
 */
class Defense extends CombatCharacteristic
{
    /**
     * @param Agility $agility
     * @return Defense
     */
    public static function getIt(Agility $agility)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return new static(SumAndRound::ceiledHalf($agility->getValue()));
    }

    /**
     * @return CombatCharacteristicCode
     */
    public function getCode()
    {
        return CombatCharacteristicCode::getIt(CombatCharacteristicCode::DEFENSE);
    }
}