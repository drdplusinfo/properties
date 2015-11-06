<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Properties\Derived\Toughness;
use DrdPlus\Properties\Derived\WoundsLimit;

class WoundsLimitTest extends AbstractTestOfDerivedProperty
{

    /**
     * @test
     */
    public function I_can_calculate_wounds_limit_bonus()
    {
        $toughness = \Mockery::mock(Toughness::class)
            ->shouldReceive('getValue')
            ->andReturn($value = 123)
            ->atLeast()->once()
            ->getMock();
        /** @var Toughness $toughness */
        $this->assertSame($value + 10, WoundsLimit::calculateWoundsBonus($toughness));
    }

    protected function getValuesForTest()
    {
        return [0, 123, 999];
    }
}
