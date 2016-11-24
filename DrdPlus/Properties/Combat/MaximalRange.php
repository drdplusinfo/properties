<?php
namespace DrdPlus\Properties\Combat;

use DrdPlus\Properties\Combat\Partials\AbstractRange;

/**
 * @method MaximalRange add(int|IntegerInterface $value)
 * @method MaximalRange sub(int|IntegerInterface $value)
 */
class MaximalRange extends AbstractRange
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
}