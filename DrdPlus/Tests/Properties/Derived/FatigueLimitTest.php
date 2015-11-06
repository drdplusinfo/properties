<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Properties\Derived\Endurance;
use DrdPlus\Properties\Derived\FatigueLimit;

class FatigueLimitTest extends AbstractTestOfDerivedProperty
{

    /**
     * @test
     */
    public function I_can_calculate_fatigue_limit_bonus()
    {
        $endurance = \Mockery::mock(Endurance::class)
            ->shouldReceive('getValue')
            ->andReturn($value = 123)
            ->atLeast()->once()
            ->getMock();
        /** @var Endurance $endurance */
        $this->assertSame($value + 10, FatigueLimit::calculateFatigueBonus($endurance));
    }

    protected function getValuesForTest()
    {
        return [0, 10, 123];
    }
}
