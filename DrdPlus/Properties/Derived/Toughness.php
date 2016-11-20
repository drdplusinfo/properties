<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Derived\Partials\AbstractDerivedProperty;
use DrdPlus\Tables\Races\RacesTable;

class Toughness extends AbstractDerivedProperty
{
    const TOUGHNESS = PropertyCode::TOUGHNESS;

    /**
     * @param Strength $strength
     * @param $raceCode
     * @param $subraceCode
     * @param RacesTable $racesTable
     */
    public function __construct(Strength $strength, $raceCode, $subraceCode, RacesTable $racesTable)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        parent::__construct($strength->getValue() + $racesTable->getToughness($raceCode, $subraceCode));
    }

    public function getCode()
    {
        return self::TOUGHNESS;
    }
}