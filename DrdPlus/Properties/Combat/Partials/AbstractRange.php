<?php
namespace DrdPlus\Properties\Combat\Partials;

use DrdPlus\Tables\Measurements\Distance\DistanceBonus;
use DrdPlus\Tables\Tables;

abstract class AbstractRange extends PositiveIntegerCharacteristicForGame
{
    /**
     * @param Tables $tables
     * @return float
     */
    public function getInMeters(Tables $tables): float
    {
        // both encounter and maximal ranges are in fact distance bonus
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return (new DistanceBonus($this->getValue(), $tables->getDistanceTable()))->getDistance()->getMeters();
    }
}