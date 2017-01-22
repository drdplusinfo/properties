<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Codes\RaceCode;
use DrdPlus\Codes\SubRaceCode;
use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Derived\Partials\AbstractDerivedProperty;
use DrdPlus\Tables\Tables;

class Toughness extends AbstractDerivedProperty
{
    const TOUGHNESS = PropertyCode::TOUGHNESS;

    /**
     * @param Strength $strength
     * @param RaceCode $raceCode
     * @param SubRaceCode $subraceCode
     * @param Tables $tables
     */
    public function __construct(Strength $strength, RaceCode $raceCode, SubRaceCode $subraceCode, Tables $tables)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        parent::__construct($strength->getValue() + $tables->getRacesTable()->getToughness($raceCode, $subraceCode));
    }

    /**
     * @return PropertyCode
     */
    public function getCode()
    {
        return PropertyCode::getIt(PropertyCode::TOUGHNESS);
    }
}