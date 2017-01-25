<?php
namespace DrdPlus\Tests\Properties\Derived\Partials;

abstract class AspectOfVisageTest extends AbstractDerivedPropertyTest
{
    /**
     * @param int $firstPropertyValue
     * @param int $secondPropertyValue
     * @param int $charismaValue
     * @return int
     */
    protected function calculateValue($firstPropertyValue, $secondPropertyValue, $charismaValue)
    {
        return (int)round(($firstPropertyValue + $secondPropertyValue) / 2 + $charismaValue / 2);
    }
}