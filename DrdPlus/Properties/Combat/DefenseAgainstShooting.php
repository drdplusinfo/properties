<?php
namespace DrdPlus\Properties\Combat;

use DrdPlus\Codes\Properties\CharacteristicForGameCode;
use DrdPlus\Properties\Body\Size;
use DrdPlus\Properties\Combat\Partials\CharacteristicForGame;
use DrdPlus\Calculations\SumAndRound;

/**
 * @method DefenseAgainstShooting add(int | IntegerInterface $value)
 * @method DefenseAgainstShooting sub(int | IntegerInterface $value)
 */
class DefenseAgainstShooting extends CharacteristicForGame
{
    /**
     * Despite rules this library deducts half of size from defense number, instead of adding to attack number,
     * because it is more practical from numbers-point-of-view
     * PPH page 104 right column top
     *
     * @param Defense $defense
     * @param Size $size
     * @return DefenseAgainstShooting
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
        return CharacteristicForGameCode::getIt(CharacteristicForGameCode::DEFENSE_AGAINST_SHOOTING);
    }
}