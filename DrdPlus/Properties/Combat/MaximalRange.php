<?php
namespace DrdPlus\Properties\Combat;

use DrdPlus\Properties\Combat\Partials\CombatGameCharacteristic;
use Granam\Integer\IntegerInterface;
use Granam\Integer\Tools\ToInteger;

class MaximalRange extends CombatGameCharacteristic
{
    /**
     * Well, sadly maximal range of a weapon is same as encounter range and that is zero (melee respectively).
     *
     * @param EncounterRange $encounterRange
     * @return MaximalRange
     */
    public static function createForMeleeWeapon(EncounterRange $encounterRange)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return new static($encounterRange->getValue());
    }

    /**
     * See PPH page 95 left column.
     *
     * @param EncounterRange $encounterRange
     * @return MaximalRange
     */
    public static function createForRangedWeapon(EncounterRange $encounterRange)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return new static($encounterRange->getValue() + 12);
    }

    /**
     * @param int|string|float|IntegerInterface $value
     * @return int
     * @throws \Granam\Integer\Tools\Exceptions\WrongParameterType
     * @throws \Granam\Integer\Tools\Exceptions\ValueLostOnCast
     * @throws \Granam\Integer\Tools\Exceptions\PositiveIntegerCanNotBeNegative
     */
    protected function sanitizeValue($value)
    {
        return ToInteger::toPositiveInteger($value);
    }
}