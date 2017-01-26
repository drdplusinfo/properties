<?php
namespace DrdPlus\Properties\Combat;

use DrdPlus\Codes\Properties\CharacteristicForGameCode;
use DrdPlus\Properties\Body\Size;
use DrdPlus\Properties\Combat\Partials\CharacteristicForGame;
use DrdPlus\Calculations\SumAndRound;

/**
 * See PPH page 104 right column top, @link https://pph.drdplus.jaroslavtyc.com/#oprava_za_velikost
 * Despite rules this library deducts half of size from defense number, instead of adding to attack number,
 * because it is more practical from numbers-point-of-view.
 * @method DefenseNumberAgainstShooting add(int | IntegerInterface $value)
 * @method DefenseNumberAgainstShooting sub(int | IntegerInterface $value)
 */
class DefenseNumberAgainstShooting extends CharacteristicForGame
{
    /**
     * @param Defense $defense
     * @param Size $size
     * @return DefenseNumberAgainstShooting
     */
    public static function getIt(Defense $defense, Size $size)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return new static($defense->getValue() - SumAndRound::half($size->getValue()));
    }

    /**
     * @return CharacteristicForGameCode
     */
    public function getCode()
    {
        return CharacteristicForGameCode::getIt(CharacteristicForGameCode::DEFENSE_NUMBER_AGAINST_SHOOTING);
    }
}