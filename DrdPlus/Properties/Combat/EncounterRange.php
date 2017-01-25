<?php
namespace DrdPlus\Properties\Combat;

use DrdPlus\Codes\Properties\CharacteristicForGameCode;
use DrdPlus\Properties\Combat\Partials\AbstractRange;
use Granam\Integer\PositiveInteger;

/**
 * @method EncounterRange add(int | IntegerInterface $value)
 * @method EncounterRange sub(int | IntegerInterface $value)
 */
class EncounterRange extends AbstractRange
{
    /**
     * @param int|PositiveInteger $value
     * @throws \Granam\Integer\Tools\Exceptions\WrongParameterType
     * @throws \Granam\Integer\Tools\Exceptions\ValueLostOnCast
     * @throws \Granam\Integer\Tools\Exceptions\PositiveIntegerCanNotBeNegative
     * @return EncounterRange
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
        return CharacteristicForGameCode::getIt(CharacteristicForGameCode::ENCOUNTER_RANGE);
    }
}