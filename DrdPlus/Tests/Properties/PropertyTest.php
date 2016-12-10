<?php
namespace DrdPlus\Tests\Properties;

use DrdPlus\Properties\Native\NativeProperty;
use DrdPlus\Properties\Property;
use Granam\Tests\Tools\TestWithMockery;

abstract class PropertyTest extends TestWithMockery
{

    /**
     * @test
     * @return Property
     */
    public function I_can_get_property_easily()
    {
        /** @var NativeProperty $propertyClass */
        $propertyClass = self::getSutClass();
        $property = false;
        foreach ($this->getValuesForTest() as $value) {
            $property = $propertyClass::getIt($value);
            self::assertInstanceOf($propertyClass, $property);
            /** @var Property $property */
            self::assertSame("$value", "{$property->getValue()}");
        }

        return $property;
    }

    /**
     * @return array|int[]|float[]|string[]
     */
    abstract protected function getValuesForTest();

    /**
     * @param Property $property
     *
     * @test
     * @depends I_can_get_property_easily
     */
    public function I_can_get_property_code(Property $property)
    {
        self::assertSame($this->getExpectedPropertyCode(), $property->getCode());
    }

    /**
     * @return string
     */
    private function getExpectedPropertyCode()
    {
        $propertyBaseName = $this->getPropertyBaseName();
        $underScoredClassName = preg_replace('~(\w)([A-Z])~', '$1_$2', $propertyBaseName);

        return strtolower($underScoredClassName);
    }

    /**
     * @return string
     */
    protected function getPropertyBaseName()
    {
        $propertyClass = self::getSutClass();

        return preg_replace('~^[\\\]?(\w+\\\){0,5}(\w+)$~', '$2', $propertyClass);
    }

    /**
     * @test
     */
    public function I_can_use_it_as_generic_group_property()
    {
        $propertyClass = self::getSutClass();
        self::assertTrue(
            is_a($propertyClass, $this->getGenericGroupPropertyClassName(), true),
            $propertyClass . ' does not belongs into ' . $this->getGenericGroupPropertyClassName()
        );
    }

    private function getGenericGroupPropertyClassName()
    {
        $propertyNamespace = $this->getPropertyNamespace();
        $namespaceBaseName = preg_replace('~^[\\\]?(\w+\\\){0,5}(\w+)$~', '$2', $propertyNamespace);
        $groupPropertyClassBaseName = preg_replace('~s$~', '', $namespaceBaseName) . 'Property';

        return $propertyNamespace . '\\' . $groupPropertyClassBaseName;
    }

    protected function getPropertyNamespace()
    {
        $propertyClass = self::getSutClass();

        return preg_replace('~[\\\]\w+$~', '', $propertyClass);
    }
}