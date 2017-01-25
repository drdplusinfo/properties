<?php
namespace DrdPlus\Tests\Properties;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Properties\Native\NativeProperty;
use DrdPlus\Properties\Property;

abstract class SimplePropertyTest extends PropertyTest
{

    /**
     * @test
     */
    public function I_can_get_property_easily()
    {
        /** @var NativeProperty $sutClass */
        $sutClass = self::getSutClass();
        foreach ((array)$this->getValuesForTest() as $value) {
            $property = $sutClass::getIt($value);
            self::assertInstanceOf($sutClass, $property);
            /** @var Property $property */
            self::assertSame("$value", "{$property->getValue()}");
            self::assertSame("$value", "{$property}");
            self::assertSame(PropertyCode::getIt($this->getExpectedPropertyCode()), $property->getCode());
        }
    }

    /**
     * @return array|int[]|float[]|string[]
     */
    abstract protected function getValuesForTest();

}