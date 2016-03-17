<?php
namespace DrdPlus\Tests\Properties;

use Doctrineum\Scalar\ScalarEnum;
use DrdPlus\Properties\Base\BaseProperty;
use DrdPlus\Properties\Body\BodyProperty;
use DrdPlus\Properties\Native\NativeProperty;
use DrdPlus\Properties\Property;
use Granam\Scalar\Scalar;
use Granam\Tests\Tools\TestWithMockery;

abstract class AbstractTestOfProperty extends TestWithMockery
{

    /**
     * @test
     * @return Property
     */
    public function I_can_get_property_easily()
    {
        $propertyClass = $this->getPropertyClass();
        $property = false;
        foreach ($this->getValuesForTest() as $value) {
            $property = $propertyClass::getIt($value);
            self::assertInstanceOf($propertyClass, $property);
            /** @var Scalar $property */
            self::assertSame("$value", "{$property->getValue()}");
        }

        return $property;
    }

    /**
     * @return string|ScalarEnum|BaseProperty|BodyProperty|NativeProperty
     */
    protected function getPropertyClass()
    {
        return preg_replace('~Tests\\\(.+)Test$~', '$1', static::class);
    }

    /**
     * @return []
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
        $propertyClass = $this->getPropertyClass();

        return preg_replace('~^[\\\]?(\w+\\\)*(\w+)$~', '$2', $propertyClass);
    }

    /**
     * @test
     */
    public function I_can_use_it_as_generic_group_property()
    {
        $propertyClass = $this->getPropertyClass();
        self::assertTrue(
            is_a($propertyClass, $this->getGenericGroupPropertyClassName(), true),
            $propertyClass . ' does not belongs into ' . $this->getGenericGroupPropertyClassName()
        );
    }

    private function getGenericGroupPropertyClassName()
    {
        $propertyNamespace = $this->getPropertyNamespace();
        $namespaceBaseName = preg_replace('~^[\\\]?(\w+\\\)*(\w+)$~', '$2', $propertyNamespace);
        $groupPropertyClassBaseName = preg_replace('~s$~', '', $namespaceBaseName) . 'Property';

        return $propertyNamespace . '\\' . $groupPropertyClassBaseName;
    }

    protected function getPropertyNamespace()
    {
        $propertyClass = $this->getPropertyClass();

        return preg_replace('~[\\\]\w+$~', '', $propertyClass);
    }
}
