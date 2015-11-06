<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Body\Size;
use DrdPlus\Properties\Derived\Speed;

class SpeedTest extends AbstractTestOfDerivedProperty
{
    /**
     * #@test
     */
    public function I_can_get_property_easily()
    {
        $speed = new Speed(
            $this->getStrength($strengthValue = 123),
            $this->getAgility($agilityValue = 456),
            $this->getSizeProperty($sizeValue = 789)
        );
        $this->assertSame('speed', $speed->getCode());
        $this->assertSame('speed', $speed::SPEED);
        $this->assertSame((int)round(($strengthValue + $agilityValue) / 2) + ($sizeValue / 3 - 2), $speed->getValue());
        $this->assertSame((string)(round(($strengthValue + $agilityValue) / 2) + ($sizeValue / 3 - 2)), "$speed");

        return $speed;
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|Strength
     */
    private function getStrength($value)
    {
        return $this->createProperty(Strength::class, $value);
    }

    /**
     * @param $className
     * @param $value
     * @return \Mockery\MockInterface
     */
    private function createProperty($className, $value)
    {
        $property = $this->mockery($className);
        /** @noinspection PhpMethodParametersCountMismatchInspection */
        $property->shouldReceive('getValue')
            ->atLeast()->once()
            ->andReturn($value);

        return $property;
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|Agility
     */
    private function getAgility($value)
    {
        return $this->createProperty(Agility::class, $value);
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|Size
     */
    private function getSizeProperty($value)
    {
        return $this->createProperty(Size::class, $value);
    }

}
