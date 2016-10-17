<?php
namespace DrdPlus\Properties\Combat;

use DrdPlus\Properties\Combat\Partials\PositiveNumberCombatGameCharacteristics;
use DrdPlus\Tables\Measurements\Distance\DistanceBonus;
use DrdPlus\Tables\Measurements\Distance\DistanceTable;

class EncounterRange extends PositiveNumberCombatGameCharacteristics
{
    /**
     * @param DistanceTable $distanceTable
     * @return int
     */
    public function getInMeters(DistanceTable $distanceTable)
    {
        // encounter range is in fact distance bonus
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return (new DistanceBonus($this->getValue(), $distanceTable))->getDistance()->getMeters();
    }
}