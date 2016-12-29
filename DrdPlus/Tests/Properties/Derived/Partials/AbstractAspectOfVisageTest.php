<?php
namespace DrdPlus\Tests\Properties\Derived\Partials;

use DrdPlus\Calculations\SumAndRound;

abstract class AbstractAspectOfVisageTest extends AbstractDerivedPropertyTest
{
    protected function calculateValue($firstPropertyValue, $secondPropertyValue, $charismaValue)
    {
        return SumAndRound::average($firstPropertyValue, $secondPropertyValue) + SumAndRound::half($charismaValue);
    }
}