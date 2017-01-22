<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Codes\RaceCode;
use DrdPlus\Codes\SubRaceCode;
use DrdPlus\Properties\Base\Knack;
use DrdPlus\Properties\Derived\Partials\AbstractDerivedProperty;
use DrdPlus\Tables\Tables;

class Senses extends AbstractDerivedProperty
{
    const SENSES = PropertyCode::SENSES;

    /**
     * @param Knack $knack
     * @param RaceCode $raceCode
     * @param SubRaceCode $subRaceCode
     * @param Tables $tables
     */
    public function __construct(Knack $knack, RaceCode $raceCode, SubRaceCode $subRaceCode, Tables $tables)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        parent::__construct($knack->getValue() + $tables->getRacesTable()->getSenses($raceCode, $subRaceCode));
    }

    /**
     * @return PropertyCode
     */
    public function getCode()
    {
        return PropertyCode::getIt(PropertyCode::SENSES);
    }
}