<?php
namespace DrdPlus\Tests\Properties\EnumTypes;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use Doctrineum\Tests\SelfRegisteringType\AbstractSelfRegisteringTypeTest;
use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\Property;

abstract class AbstractTestOfPropertyType extends AbstractSelfRegisteringTypeTest
{

    /**
     * @test
     */
    public function Type_can_be_converted_to_PHP_value()
    {
        $propertyTypeClass = $this->getTypeClass();
        $propertyTypeClass::registerSelf();
        $propertyType = Type::getType($this->getExpectedTypeName());
        $phpValue = $propertyType->convertToPHPValue($value = $this->getValue(), $this->getPlatform());
        self::assertInstanceOf($this->getRegisteredClass(), $phpValue);
        self::assertEquals($value, (string)$phpValue);
    }

    abstract protected function getValue();

    protected function getRegisteredClass()
    {
        $propertyTypeClass = $this->getTypeClass();
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

    /**
     * @test
     */
    public function I_get_same_type_name_as_property_code()
    {
        $propertyClass = $this->getRegisteredClass();
        /** @var Property $property */
        $property = (new \ReflectionClass($propertyClass))->newInstanceWithoutConstructor();
        self::assertSame($this->getExpectedTypeName(), $property->getCode());
        $constantName = strtoupper($this->getExpectedTypeName());
        self::assertTrue(defined(PropertyCode::class . '::' . $constantName));
        self::assertSame(constant(PropertyCode::class . '::' . $constantName), $property->getCode());
    }
}
