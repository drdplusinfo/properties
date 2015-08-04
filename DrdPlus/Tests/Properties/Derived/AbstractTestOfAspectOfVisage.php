<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Tests\Properties\TestWithMockery;
use DrdPlus\Tools\Numbers\SumAndRound;

abstract class AbstractTestOfAspectOfVisage extends TestWithMockery
{
    protected function calculateValue($firstPropertyValue, $secondPropertyValue, $charismaValue)
    {
        return SumAndRound::average($firstPropertyValue, $secondPropertyValue) + SumAndRound::half($charismaValue);
    }
}
