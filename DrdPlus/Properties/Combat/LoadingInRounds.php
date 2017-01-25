<?php
namespace DrdPlus\Properties\Combat;

use DrdPlus\Codes\Properties\CharacteristicForGameCode;
use DrdPlus\Properties\Combat\Partials\PositiveIntegerCharacteristicForGame;
use Granam\Integer\IntegerInterface;
use Granam\Integer\PositiveInteger;

/**
 * @method LoadingInRounds add(int | IntegerInterface $value)
 * @method LoadingInRounds sub(int | IntegerInterface $value)
 */
class LoadingInRounds extends PositiveIntegerCharacteristicForGame
{
    /**
     * @param int|PositiveInteger $value
     * @return LoadingInRounds
     * @throws \Granam\Integer\Tools\Exceptions\WrongParameterType
     * @throws \Granam\Integer\Tools\Exceptions\ValueLostOnCast
     * @throws \Granam\Integer\Tools\Exceptions\PositiveIntegerCanNotBeNegative
     */
    public static function getIt($value)
    {
        return new static($value);
    }

    /**
     * @return CharacteristicForGameCode
     */
    public function getCode()
    {
        return CharacteristicForGameCode::getIt(CharacteristicForGameCode::LOADING_IN_ROUNDS);
    }
}