<?php
namespace DrdPlus\Tests\Properties\EnumTypes;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use Doctrineum\Tests\SelfRegisteringType\AbstractSelfRegisteringTypeTest;

abstract class AbstractTestOfPropertyType extends AbstractSelfRegisteringTypeTest
{

    /**
     * @test
     */
    public function I_can_registered_the_type()
    {
        $propertyTypeClass = $this->getTypeClass();
        $propertyTypeClass::registerSelf();
        self::assertTrue(Type::hasType($this->getExpectedTypeName()));
    }

    /**
     * @test
     * @depends I_can_registered_the_type
     */
    public function Type_can_be_converted_to_PHP_value()
    {
        $propertyType = Type::getType($this->getExpectedtypeName());
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
}
