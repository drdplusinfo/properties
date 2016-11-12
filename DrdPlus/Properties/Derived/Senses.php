<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Codes\RaceCode;
use DrdPlus\Codes\SubRaceCode;
use DrdPlus\Properties\Base\Knack;
use DrdPlus\Properties\Derived\Partials\AbstractDerivedProperty;
use DrdPlus\Tables\Races\RacesTable;
use Granam\Integer\Tools\ToInteger;

class Senses extends AbstractDerivedProperty
{
    const SENSES = PropertyCode::SENSES;

    public function __construct(
        Knack $knack,
        RaceCode $raceCode,
        SubRaceCode $subRaceCode,
        RacesTable $racesTable
    )
    {
        $this->value = $knack->getValue()
            + ToInteger::toInteger($racesTable->getSenses($raceCode->getValue(), $subRaceCode->getValue()));
    }

    public function getCode()
    {
        return self::SENSES;
    }
}