<?php
declare(strict_types=1);
namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Codes\RaceCode;
use DrdPlus\Codes\SubRaceCode;
use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Derived\Partials\AbstractDerivedProperty;
use DrdPlus\Tables\Tables;

class Toughness extends AbstractDerivedProperty
{
    /**
     * @param Strength $strength
     * @param RaceCode $raceCode
     * @param SubRaceCode $subraceCode
     * @param Tables $tables
     * @return Toughness
     */
    public static function getIt(Strength $strength, RaceCode $raceCode, SubRaceCode $subraceCode, Tables $tables): Toughness
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return new static($strength->getValue() + $tables->getRacesTable()->getToughness($raceCode, $subraceCode));
    }

    /**
     * @return PropertyCode
     */
    public function getCode(): PropertyCode
    {
        return PropertyCode::getIt(PropertyCode::TOUGHNESS);
    }
}