<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Derived\Parts\AbstractDerivedProperty;
use DrdPlus\Tables\Races\RacesTable;

class Toughness extends AbstractDerivedProperty
{
    const TOUGHNESS = 'toughness';

    public function __construct(Strength $strength, $raceCode, $subraceCode, RacesTable $racesTable)
    {
        $this->value = $strength->getValue() + $racesTable->getToughness($raceCode, $subraceCode);
    }

    public function getCode()
    {
        return self::TOUGHNESS;
    }
}
