<?php
namespace DrdPlus\Properties\Combat;

use DrdPlus\Codes\Properties\CharacteristicForGameCode;
use DrdPlus\Properties\Combat\Partials\CharacteristicForGame;

/**
 * @method DefenseNumber add(int | IntegerInterface $value)
 * @method DefenseNumber sub(int | IntegerInterface $value)
 */
class DefenseNumber extends CharacteristicForGame
{
    /**
     * See PPH page 34 left column
     * , @link https://pph.drdplus.jaroslavtyc.com/#tabulka_bojovych_charakteristik
     *
     * @param Defense $defense
     * @return DefenseNumber
     */
    public static function getIt(Defense $defense)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return new static($defense->getValue());
    }

    /**
     * @return CharacteristicForGameCode
     */
    public function getCode()
    {
        return CharacteristicForGameCode::getIt(CharacteristicForGameCode::DEFENSE_NUMBER);
    }
}