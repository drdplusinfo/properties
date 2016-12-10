<?php
namespace DrdPlus\Tests\Properties\Derived\Partials;

use DrdPlus\Properties\Derived\Partials\AbstractDerivedProperty;
use DrdPlus\Tests\Properties\PropertyTest;

abstract class AbstractDerivedPropertyTest extends PropertyTest
{

    protected function getValuesForTest()
    {
        throw new \LogicException('Should not be called');
    }

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
     * @depends I_can_get_property_easily
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