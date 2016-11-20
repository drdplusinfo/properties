<?php
namespace DrdPlus\Tests\Properties\Combat;

use DrdPlus\Properties\Combat\EncounterRange;
use DrdPlus\Tests\Properties\Combat\Partials\AbstractRangeTest;

class EncounterRangeTest extends AbstractRangeTest
{

    /**
     * @param int $value
     * @return EncounterRange
     */
    protected function createRangeSut($value)
    {
        return new EncounterRange($value);
    }
}