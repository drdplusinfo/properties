<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Tools\Numbers\SumAndRound;

abstract class AbstractTestOfAspectOfVisage extends AbstractTestOfDerivedProperty
{
    protected function calculateValue($firstPropertyValue, $secondPropertyValue, $charismaValue)
    {
        return SumAndRound::average($firstPropertyValue, $secondPropertyValue) + SumAndRound::half($charismaValue);
    }
}
