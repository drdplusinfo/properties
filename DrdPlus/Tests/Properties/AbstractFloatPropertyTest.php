<?php
namespace DrdPlus\Tests\Properties;

use DrdPlus\Properties\AbstractFloatProperty;

abstract class AbstractFloatPropertyTest extends AbstractTestOfStoredProperty
{

    protected function getValuesForTest()
    {
        return [0.01, 123.456];
    }

    /**
     * @test
     */
    public function I_can_add_value()
    {
        $propertyClass = $this->getSutClass();
        /** @var AbstractFloatProperty $property */
        $property = $propertyClass::getIt(123.456);
        $greater = $property->add(456.789);
        self::assertSame(123.456, $property->getValue());
        self::assertNotEquals($property, $greater);
        self::assertSame(580.245, $greater->getValue());
        $double = $greater->add($greater);
        self::assertSame(1160.490, $double->getValue());
    }

    /**
     * @test
     */
    public function I_can_subtract_value()
    {
        $propertyClass = $this->getSutClass();
        /** @var AbstractFloatProperty $property */
        $property = $propertyClass::getIt(0.5);
        $low = $property->sub(0.2);
        self::assertSame(0.5, $property->getValue());
        self::assertNotEquals($property, $low);
        self::assertSame(0.3, $low->getValue());
        $zero = $low->sub($low);
        self::assertSame(0.0, $zero->getValue());
    }
}