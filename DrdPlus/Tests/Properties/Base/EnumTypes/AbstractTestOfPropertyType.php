<?php
namespace DrdPlus\Tests\Properties\Base\EnumTypes;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use Doctrineum\Scalar\EnumType;
use DrdPlus\Tests\Properties\TestWithMockery;

abstract class AbstractTestOfPropertyType extends TestWithMockery
{

    /**
     * @test
     */
    public function type_is_as_expected()
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
     * @return string|EnumType
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
     * @depends type_is_as_expected
     */
    public function can_be_registered()
    {
        $propertyTypeClass = $this->getPropertyTypeClass();
        $propertyTypeClass::registerSelf();
        $this->assertTrue(Type::hasType($propertyTypeClass::getTypeName()));
    }

    /**
     * @test
     * @depends can_be_registered
     */
    public function conversion_to_php_gives_property()
    {
        $propertyTypeClass = $this->getPropertyTypeClass();
        $propertyType = Type::getType($propertyTypeClass::getTypeName());
        $phpValue = $propertyType->convertToPHPValue($value = 12345, $this->getPlatform());
        $this->assertInstanceOf($this->getPropertyClass(), $phpValue);
        $this->assertEquals($value, $phpValue->__toString());
    }

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
