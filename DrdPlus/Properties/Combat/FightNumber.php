<?php
namespace DrdPlus\Properties\Combat;

use DrdPlus\Codes\Armaments\WeaponlikeCode;
use DrdPlus\Properties\Combat\Partials\CombatCharacteristic;
use DrdPlus\Tables\Tables;

/**
 * @method FightNumber add(int | IntegerInterface $value)
 * @method FightNumber sub(int | IntegerInterface $value)
 */
class FightNumber extends CombatCharacteristic
{
    /**
     * @param Fight $fight
     * @param WeaponlikeCode $weaponlikeCode
     * @param Tables $tables
     */
    public function __construct(Fight $fight, WeaponlikeCode $weaponlikeCode, Tables $tables)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        parent::__construct($fight->getValue() + $tables->getArmourer()->getLengthOfWeaponOrShield($weaponlikeCode));
    }
}