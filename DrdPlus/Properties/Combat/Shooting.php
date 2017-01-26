<?php
namespace DrdPlus\Properties\Combat;

use DrdPlus\Codes\CombatCharacteristicCode;
use DrdPlus\Properties\Base\Knack;
use DrdPlus\Calculations\SumAndRound;
use DrdPlus\Properties\Combat\Partials\CombatCharacteristic;

/**
 * See PPH page 34 left column, @link https://pph.drdplus.jaroslavtyc.com/#tabulka_bojovych_charakteristik
 * Shooting can change only with Knack.
 */
class Shooting extends CombatCharacteristic
{
    /**
     * @param Knack $knack
     * @return Shooting
     */
    public static function getIt(Knack $knack)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return new static(SumAndRound::flooredHalf($knack->getValue()));
    }

    /**
     * @return CombatCharacteristicCode
     */
    public function getCode()
    {
        return CombatCharacteristicCode::getIt(CombatCharacteristicCode::SHOOTING);
    }
}