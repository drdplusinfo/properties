<?php
namespace DrdPlus\Tests\Properties;

use DrdPlus\Properties\AbstractIntegerProperty;

abstract class AbstractTestOfIntegerStoredProperty extends AbstractTestOfStoredProperty
{

    /**
     * @test
     */
    public function I_can_get_float_property_easily()
    {
        $propertyClass = $this->getPropertyClass();
        /** @var AbstractIntegerProperty $propertyClass */
        $property = $propertyClass::getIt($this->getValuesForTest());
        $this->assertInstanceOf($propertyClass, $property);
    }

    /**
     * @return int
     */
    protected function getValuesForTest()
    {
        return [123456];
    }

}
