<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Derived\Parts\AbstractDerivedProperty;
use DrdPlus\Races\Race;
use DrdPlus\Tables\Races\RacesTable;

class Toughness extends AbstractDerivedProperty
{
    const TOUGHNESS = 'toughness';

    public function __construct(Strength $strength, Race $race, RacesTable $racesTable)
    {
        $this->value = $strength->getValue() + $racesTable->getToughness($race->getRaceCode(), $race->getSubraceCode());
    }

    public function getCode()
    {
        return self::TOUGHNESS;
    }
}
