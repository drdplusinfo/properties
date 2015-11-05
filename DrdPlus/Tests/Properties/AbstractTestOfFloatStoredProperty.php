<?php
namespace DrdPlus\Tests\Properties;

use DrdPlus\Properties\AbstractFloatProperty;

abstract class AbstractTestOfFloatStoredProperty extends AbstractTestOfStoredProperty
{

    /**
     * @test
     */
    public function I_can_get_float_property_easily()
    {
        $propertyClass = $this->getPropertyClass();
        /** @var AbstractFloatProperty $propertyClass */
        foreach ($this->getValuesForTest() as $value) {
            $property = $propertyClass::getIt($value);
            $this->assertInstanceOf($propertyClass, $property);
        }
    }

    protected function getValuesForTest()
    {
        return [123.456];
    }

}
