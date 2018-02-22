<?php
declare(strict_types=1);/** be strict for parameter types, https://www.quora.com/Are-strict_types-in-PHP-7-not-a-bad-idea */
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