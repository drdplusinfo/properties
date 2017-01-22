<?php
namespace DrdPlus\Properties\Combat;

use DrdPlus\Properties\Combat\Partials\CombatCharacteristic;

/**
 * @method AttackNumber add(int | IntegerInterface $value)
 * @method AttackNumber sub(int | IntegerInterface $value)
 */
class AttackNumber extends CombatCharacteristic
{
    /**
     * @param Attack $attack
     * @return AttackNumber
     */
    public static function createFromAttack(Attack $attack)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return new static($attack->getValue());
    }

    /**
     * @param Shooting $shooting
     * @return AttackNumber
     */
    public static function createFromShooting(Shooting $shooting)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return new static($shooting->getValue());
    }
}