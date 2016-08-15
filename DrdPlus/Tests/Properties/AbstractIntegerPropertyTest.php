<?php
namespace DrdPlus\Tests\Properties;

use DrdPlus\Properties\AbstractIntegerProperty;

abstract class AbstractIntegerPropertyTest extends AbstractTestOfStoredProperty
{

    /**
     * @return int[]
     */
    protected function getValuesForTest()
    {
        return [0, 123456];
    }

    /**
     * @test
     */
    public function I_can_add_value()
    {
        $propertyClass = $this->getSutClass();
        /** @var AbstractIntegerProperty $property */
        $property = $propertyClass::getIt(123);
        $greater = $property->add(456);
        self::assertSame(123, $property->getValue());
        self::assertNotEquals($property, $greater);
        self::assertSame(579, $greater->getValue());
    }

    /**
     * @test
     */
    public function I_can_subtract_value()
    {
        $propertyClass = $this->getSutClass();
        /** @var AbstractIntegerProperty $property */
        $property = $propertyClass::getIt(123);
        $low = $property->sub(456);
        self::assertSame(123, $property->getValue());
        self::assertNotEquals($property, $low);
        self::assertSame(-333, $low->getValue());
    }

}