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
        $property = $propertyClass::getIt($this->getValue());
        $this->assertInstanceOf($propertyClass, $property);
    }

    /**
     * @return float
     */
    protected function getValue()
    {
        return 123.456;
    }

}
