<?php
namespace DrdPlus\Tests\Properties\Base;

use Doctrineum\Scalar\Enum;
use DrdPlus\Properties\PropertyInterface;
use DrdPlus\Tests\Properties\TestWithMockery;

abstract class AbstractTestOfProperty extends TestWithMockery
{

    /**
     * @return PropertyInterface
     *
     * @test
     */
    public function can_be_created()
    {
        $propertyClass = $this->getPropertyClass();
        $instance = $propertyClass::getEnum(12345);
        $this->assertInstanceOf($propertyClass, $instance);

        return $instance;
    }

    /**
     * @return string|PropertyInterface|Enum
     */
    private function getPropertyClass()
    {
        return preg_replace('~Tests\\\(.+)Test$~', '$1', static::class);
    }

    /**
     * @param PropertyInterface $property
     *
     * @test
     * @depends can_be_created
     */
    public function has_expected_property_code(PropertyInterface $property)
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
     * @depends can_be_created
     */
    public function can_give_value_by_shortcut_getter()
    {
        $propertyClass = $this->getPropertyClass();
        /** @var PropertyInterface $property */
        $property = $propertyClass::getEnum($value = 123);
        $this->assertSame($value, $property->getValue());
    }
}
