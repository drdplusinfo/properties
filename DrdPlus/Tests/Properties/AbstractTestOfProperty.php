<?php
namespace DrdPlus\Tests\Properties;

use Doctrineum\Scalar\ScalarEnum;
use DrdPlus\Properties\Base\BaseProperty;
use DrdPlus\Properties\Body\BodyProperty;
use DrdPlus\Properties\Native\NativeProperty;
use DrdPlus\Properties\PropertyInterface;
use DrdPlus\Tools\Tests\TestWithMockery;
use Granam\Scalar\Scalar;

abstract class AbstractTestOfProperty extends TestWithMockery
{

    /**
     * @test
     * @return PropertyInterface
     */
    public function I_can_get_property_easily()
    {
        $propertyClass = $this->getPropertyClass();
        $property = false;
        foreach ($this->getValuesForTest() as $value) {
            $property = $propertyClass::getIt($value);
            $this->assertInstanceOf($propertyClass, $property);
            /** @var Scalar $property */
            $this->assertSame("$value", "{$property->getValue()}");
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
     * @param PropertyInterface $property
     *
     * @test
     * @depends I_can_get_property_easily
     */
    public function I_can_get_property_code(PropertyInterface $property)
    {
        $this->assertSame($this->getExpectedPropertyCode(), $property->getCode());
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
        $this->assertTrue(
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
        $propertyNamespace = preg_replace('~[\\\]\w+$~', '', $propertyClass);

        return $propertyNamespace;
    }
}
