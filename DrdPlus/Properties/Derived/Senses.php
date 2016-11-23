<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Codes\RaceCode;
use DrdPlus\Codes\SubRaceCode;
use DrdPlus\Properties\Base\Knack;
use DrdPlus\Properties\Derived\Partials\AbstractDerivedProperty;
use DrdPlus\Tables\Races\RacesTable;

class Senses extends AbstractDerivedProperty
{
    const SENSES = PropertyCode::SENSES;

    /**
     * @param Knack $knack
     * @param RaceCode $raceCode
     * @param SubRaceCode $subRaceCode
     * @param RacesTable $racesTable
     */
    public function __construct(Knack $knack, RaceCode $raceCode, SubRaceCode $subRaceCode, RacesTable $racesTable)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        parent::__construct($knack->getValue() + $racesTable->getSenses($raceCode, $subRaceCode));
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return self::SENSES;
    }
}