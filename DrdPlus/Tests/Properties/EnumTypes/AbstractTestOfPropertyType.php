<?php
namespace DrdPlus\Tests\Properties\EnumTypes;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use Doctrineum\Scalar\ScalarEnumType;
use DrdPlus\Tools\Tests\TestWithMockery;

abstract class AbstractTestOfPropertyType extends TestWithMockery
{

    /**
     * @test
     */
    public function Type_has_expected_name()
    {
        $propertyTypeClass = $this->getPropertyTypeClass();
        $propertyName = $this->getPropertyName();
        $constantName = strtoupper($propertyName);
        $this->assertTrue(
            defined("$propertyTypeClass::$constantName"),
            "Constant $propertyTypeClass::$constantName is not defined"
        );
        $this->assertSame($propertyName, constant("$propertyTypeClass::$constantName"));
        $this->assertSame($propertyName, $propertyTypeClass::getTypeName());
    }

    /**
     * @return string|ScalarEnumType
     */
    private function getPropertyTypeClass()
    {
        return preg_replace('~Tests\\\(.+)Test$~', '$1', static::class);
    }

    /**
     * @return string
     */
    private function getPropertyName()
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
        $propertyTypeClass = $this->getPropertyTypeClass();

        return preg_replace('~^.*\\\(\w+)Type$~', '$1', $propertyTypeClass);
    }

    /**
     * @test
     * @depends Type_has_expected_name
     */
    public function I_can_registered_the_type()
    {
        $propertyTypeClass = $this->getPropertyTypeClass();
        $propertyTypeClass::registerSelf();
        $this->assertTrue(Type::hasType($propertyTypeClass::getTypeName()));
    }

    /**
     * @test
     * @depends I_can_registered_the_type
     */
    public function Type_can_be_converted_to_PHP_value()
    {
        $propertyTypeClass = $this->getPropertyTypeClass();
        $propertyType = Type::getType($propertyTypeClass::getTypeName());
        $phpValue = $propertyType->convertToPHPValue($value = $this->getValue(), $this->getPlatform());
        $this->assertInstanceOf($this->getPropertyClass(), $phpValue);
        $this->assertEquals($value, $phpValue->__toString());
    }

    abstract protected function getValue();

    protected function getPropertyClass()
    {
        $propertyTypeClass = $this->getPropertyTypeClass();
        $propertyClass = preg_replace('~\\\(\w+)\\\(\w+)Type$~', '\\\$2', $propertyTypeClass);

        return $propertyClass;
    }

    /**
     * @return \Mockery\MockInterface|AbstractPlatform
     */
    private function getPlatform()
    {
        return \Mockery::mock(AbstractPlatform::class);
    }
}
