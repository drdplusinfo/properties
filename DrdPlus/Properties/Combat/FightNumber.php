<?php
namespace DrdPlus\Properties\Combat;

use DrdPlus\Codes\Armaments\WeaponlikeCode;
use DrdPlus\Codes\Properties\CharacteristicForGameCode;
use DrdPlus\Properties\Combat\Partials\CharacteristicForGame;
use DrdPlus\Tables\Tables;

/**
 * @method FightNumber add(int | \Granam\Integer\IntegerInterface $value)
 * @method FightNumber sub(int | \Granam\Integer\IntegerInterface $value)
 */
class FightNumber extends CharacteristicForGame
{
    /**
     * @param Fight $fight
     * @param WeaponlikeCode $weaponlikeCode
     * @param Tables $tables
     * @return FightNumber
     */
    public static function getIt(Fight $fight, WeaponlikeCode $weaponlikeCode, Tables $tables): FightNumber
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return new static($fight->getValue() + $tables->getArmourer()->getLengthOfWeaponOrShield($weaponlikeCode));
    }

    /**
     * @return CharacteristicForGameCode
     */
    public function getCode(): CharacteristicForGameCode
    {
        return CharacteristicForGameCode::getIt(CharacteristicForGameCode::FIGHT_NUMBER);
    }
}