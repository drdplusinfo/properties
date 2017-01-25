<?php
namespace DrdPlus\Properties\Combat;

use DrdPlus\Codes\Armaments\WeaponlikeCode;
use DrdPlus\Codes\Properties\CharacteristicForGameCode;
use DrdPlus\Properties\Combat\Partials\CharacteristicForGame;
use DrdPlus\Tables\Tables;

/**
 * @method FightNumber add(int | IntegerInterface $value)
 * @method FightNumber sub(int | IntegerInterface $value)
 */
class FightNumber extends CharacteristicForGame
{
    /**
     * @param Fight $fight
     * @param WeaponlikeCode $weaponlikeCode
     * @param Tables $tables
     * @return FightNumber
     */
    public static function getIt(Fight $fight, WeaponlikeCode $weaponlikeCode, Tables $tables)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return new static($fight->getValue() + $tables->getArmourer()->getLengthOfWeaponOrShield($weaponlikeCode));
    }

    /**
     * @return CharacteristicForGameCode
     */
    public function getCode()
    {
        return CharacteristicForGameCode::getIt(CharacteristicForGameCode::FIGHT_NUMBER);
    }
}