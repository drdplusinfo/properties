<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Properties\Derived\Partials\AbstractDerivedProperty;
use DrdPlus\Tables\Measurements\Fatigue\FatigueBonus;
use DrdPlus\Tables\Tables;

class FatigueBoundary extends AbstractDerivedProperty
{
    const FATIGUE_BOUNDARY = PropertyCode::FATIGUE_BOUNDARY;

    /**
     * @param Endurance $endurance
     * @param Tables $tables
     */
    public function __construct(Endurance $endurance, Tables $tables)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        parent::__construct(
            $tables->getFatigueTable()->toFatigue(
                new FatigueBonus(
                    $endurance->getValue() + 10,
                    $tables->getFatigueTable()
                )
            )->getValue()
        );
    }

    /**
     * @return PropertyCode
     */
    public function getCode()
    {
        return PropertyCode::getIt(PropertyCode::FATIGUE_BOUNDARY);
    }
}