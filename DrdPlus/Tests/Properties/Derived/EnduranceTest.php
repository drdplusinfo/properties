<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Base\Will;
use DrdPlus\Properties\Derived\Endurance;

class EnduranceTest extends AbstractTestOfDerivedProperty
{
    /**
     * #@test
     */
    public function I_can_get_property_easily()
    {
        $endurance = new Endurance($this->getStrength($agilityValue = 123), $this->getWill($knackValue = 456));
        $this->assertSame('endurance', $endurance->getCode());
        $this->assertSame('endurance', $endurance->getCode());
        $this->assertSame((int)round($agilityValue + $knackValue), $endurance->getValue());
        $this->assertSame((string)round($agilityValue + $knackValue), "$endurance");

        return $endurance;
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
     * @return \Mockery\MockInterface|Will
     */
    private function getWill($value)
    {
        return $this->createProperty(Will::class, $value);
    }
}
