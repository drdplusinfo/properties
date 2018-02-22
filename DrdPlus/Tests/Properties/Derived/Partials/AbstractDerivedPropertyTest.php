<?php
declare(strict_types=1);/** be strict for parameter types, https://www.quora.com/Are-strict_types-in-PHP-7-not-a-bad-idea */
namespace DrdPlus\Tests\Properties\Derived\Partials;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Properties\Derived\Partials\AbstractDerivedProperty;
use DrdPlus\Tests\Properties\PropertyTest;

abstract class AbstractDerivedPropertyTest extends PropertyTest
{
    /**
     * @return string
     */
    protected function getExpectedCodeClass()
    {
        return PropertyCode::class;
    }

    /**
     * @test
     */
    public function I_can_get_property_easily()
    {
        $reflectionClass = new \ReflectionClass(self::getSutClass());
        self::assertTrue(
            $reflectionClass->hasMethod('getIt'),
            self::getSutClass() . ' does not have getIt factory method'
        );
        $getIt = $reflectionClass->getMethod('getIt');
        self::assertTrue($getIt->isStatic());
        $sutBaseName = preg_replace('~.*[\\\]([^\\\]+)$~', '$1', self::getSutClass());
        self::assertContains(" * @return $sutBaseName", $getIt->getDocComment());
    }

    /**
     * @test
     * @return AbstractDerivedProperty
     */
    abstract public function I_can_use_it();

    /**
     * @param $className
     * @param $value
     * @return \Mockery\MockInterface
     */
    protected function createProperty($className, $value)
    {
        $property = $this->mockery($className);
        $property->shouldReceive('getValue')
            ->atLeast()->once()
            ->andReturn($value);

        return $property;
    }

    /**
     * @test
     * @depends I_can_use_it
     * @param AbstractDerivedProperty $derivedProperty
     */
    public function I_can_add_and_remove_value_from_property(AbstractDerivedProperty $derivedProperty)
    {
        $increased = $derivedProperty->add(123);
        self::assertNotEquals($derivedProperty, $increased);
        self::assertSame($derivedProperty->getValue() + 123, $increased->getValue());

        $decreased = $derivedProperty->sub(456);
        self::assertNotEquals($derivedProperty, $decreased);
        self::assertSame($derivedProperty->getValue() - 456, $decreased->getValue());
    }
}