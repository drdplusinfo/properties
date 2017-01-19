<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\Derived\Partials\AbstractDerivedProperty;
use DrdPlus\Tables\Measurements\Wounds\WoundsBonus;
use DrdPlus\Tables\Tables;

class WoundBoundary extends AbstractDerivedProperty
{
    const WOUND_BOUNDARY = PropertyCode::WOUND_BOUNDARY;

    /**
     * @param Toughness $toughness
     * @param Tables $tables
     */
    public function __construct(Toughness $toughness, Tables $tables)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        parent::__construct(
            $tables->getWoundsTable()->toWounds(
                new WoundsBonus(
                    $toughness->getValue() + 10,
                    $tables->getWoundsTable()
                )
            )->getValue()
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