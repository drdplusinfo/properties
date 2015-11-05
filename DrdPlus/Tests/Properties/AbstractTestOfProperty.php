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
        $instance = $this->createInstance($propertyClass, $this->getValuesForTest());
        $this->assertInstanceOf($propertyClass, $instance);

        return $instance;
    }

    /**
     * @param string $propertyClass
     * @param $value
     *
     * @return PropertyInterface
     */
    protected function createInstance($propertyClass, $value)
    {
        /** @var PropertyInterface $propertyClass */
        return $propertyClass::getIt($value);
    }

    /**
     * @return []
     */
    abstract protected function getValuesForTest();

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
        foreach ($this->getValuesForTest() as $value) {
            /** @var PropertyInterface $propertyClass */
            $property = $propertyClass::getIt($value);
            $this->assertInstanceOf($propertyClass, $property);
            $this->assertSame($value, $property->getValue());
        }
    }
}
