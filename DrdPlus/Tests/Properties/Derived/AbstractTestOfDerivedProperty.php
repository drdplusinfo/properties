<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Tests\Properties\AbstractTestOfProperty;

abstract class AbstractTestOfDerivedProperty extends AbstractTestOfProperty
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
}
