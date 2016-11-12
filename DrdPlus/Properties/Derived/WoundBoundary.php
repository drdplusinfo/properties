<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\Derived\Partials\AbstractDerivedProperty;
use DrdPlus\Tables\Measurements\Wounds\WoundsBonus;
use DrdPlus\Tables\Measurements\Wounds\WoundsTable;

class WoundBoundary extends AbstractDerivedProperty
{
    const WOUND_BOUNDARY = PropertyCode::WOUND_BOUNDARY;

    public function __construct(Toughness $toughness, WoundsTable $woundsTable)
    {
        $wounds = $woundsTable->toWounds(new WoundsBonus($toughness->getValue() + 10, $woundsTable));
        $this->value = $wounds->getValue();
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return self::WOUND_BOUNDARY;
    }
}
