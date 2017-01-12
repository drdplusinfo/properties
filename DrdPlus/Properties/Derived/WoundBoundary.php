<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\Derived\Partials\AbstractDerivedProperty;
use DrdPlus\Tables\Measurements\Wounds\WoundsBonus;
use DrdPlus\Tables\Measurements\Wounds\WoundsTable;

class WoundBoundary extends AbstractDerivedProperty
{
    const WOUND_BOUNDARY = PropertyCode::WOUND_BOUNDARY;

    /**
     * @param Toughness $toughness
     * @param WoundsTable $woundsTable
     */
    public function __construct(Toughness $toughness, WoundsTable $woundsTable)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        parent::__construct(
            $woundsTable->toWounds(new WoundsBonus($toughness->getValue() + 10, $woundsTable))
                ->getValue()
        );
    }

    /**
     * @return PropertyCode
     */
    public function getCode()
    {
        return PropertyCode::getIt(PropertyCode::WOUND_BOUNDARY);
    }
}