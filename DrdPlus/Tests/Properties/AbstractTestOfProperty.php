<?php
namespace DrdPlus\Tests\Properties;

use Doctrineum\Scalar\Enum;
use DrdPlus\Properties\PropertyInterface;

abstract class AbstractTestOfProperty extends TestWithMockery
{

    /**
     * @return PropertyInterface
     *
     * @test
     */
    public function I_can_create_property()
    {
        $propertyClass = $this->getPropertyClass();
        $instance = $this->createInstance($propertyClass, $this->getValue());
        $this->assertInstanceOf($propertyClass, $instance);

        return $instance;
    }

    /**
     * @param string $propertyClass
     * @param $value
     *
     * @return PropertyInterface
     */
    abstract protected function createInstance($propertyClass, $value);

    /**
     * @return int|float|string
     */
    abstract protected function getValue();

    /**
     * @return string|PropertyInterface|Enum
     */
    protected function getPropertyClass()
    {
        return preg_replace('~Tests\\\(.+)Test$~', '$1', static::class);
    }

    /**
     * @param PropertyInterface $property
     *
     * @test
     * @depends I_can_create_property
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
    private function getPropertyBaseName()
    {
        $propertyClass = $this->getPropertyClass();

        return preg_replace('~(\w+\\\)*(\w+)~', '$2', $propertyClass);
    }

    /**
     * @test
     * @depends I_can_create_property
     */
    public function I_can_get_value_of_property()
    {
        $propertyClass = $this->getPropertyClass();
        /** @var PropertyInterface $property */
        $property = $this->createInstance($propertyClass, $value = $this->getValue());
        $this->assertSame($value, $property->getValue());
    }
}
