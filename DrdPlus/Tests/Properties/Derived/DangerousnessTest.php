<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Base\Will;
use DrdPlus\Properties\Derived\Dangerousness;

class DangerousnessTest extends AbstractTestOfAspectOfVisage
{

    /**
     * #@test
     */
    public function I_can_create_dangerousness()
    {
        $dangerousness = new Dangerousness($this->getStrength($strengthValue = 123), $this->getWill($willValue = 456), $this->getCharisma($charismaValue = 789));
        $this->assertSame('dangerousness', $dangerousness->getCode());
        $this->assertSame('dangerousness', $dangerousness->getCode());
        $this->assertSame($this->calculateValue($strengthValue, $willValue, $charismaValue), $dangerousness->getValue());
        $this->assertSame((string)$this->calculateValue($strengthValue, $willValue, $charismaValue), "$dangerousness");
    }

    /**
     * @param $value
     *
     * @return \Mockery\MockInterface|Strength
     */
    private function getStrength($value)
    {
        return $this->createProperty(Strength::class, $value);
    }

    /**
     * @param $className
     * @param $value
     *
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
     *
     * @return \Mockery\MockInterface|Will
     */
    private function getWill($value)
    {
        return $this->createProperty(Will::class, $value);
    }

    /**
     * @param $value
     *
     * @return \Mockery\MockInterface|Charisma
     */
    private function getCharisma($value)
    {
        return $this->createProperty(Charisma::class, $value);
    }
}
