<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Codes\RaceCode;
use DrdPlus\Codes\SubRaceCode;
use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Derived\Partials\AbstractDerivedProperty;
use DrdPlus\Tables\Races\RacesTable;

class Toughness extends AbstractDerivedProperty
{
    const TOUGHNESS = PropertyCode::TOUGHNESS;

    /**
     * @param Strength $strength
     * @param RaceCode $raceCode
     * @param SubRaceCode $subraceCode
     * @param RacesTable $racesTable
     */
    public function __construct(Strength $strength, RaceCode $raceCode, SubRaceCode $subraceCode, RacesTable $racesTable)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        parent::__construct($strength->getValue() + $racesTable->getToughness($raceCode, $subraceCode));
    }

    /**
     * @return PropertyCode
     */
    public function getCode()
    {
        return PropertyCode::getIt(PropertyCode::TOUGHNESS);
    }
}