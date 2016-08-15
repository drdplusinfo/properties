<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Derived\MaximalLoad;
use DrdPlus\Properties\Derived\Athletics;
use Granam\Integer\IntegerInterface;
use Granam\Tests\Tools\TestWithMockery;

class MaximalLoadTest extends TestWithMockery
{
    /**
     * @test
     * @dataProvider provideStrengthAthleticsAndExpectedMaximalLoad
     * @param $strength
     * @param $athletics
     * @param MaximalLoad
     */
    public function I_can_get_property_easily($strength, $athletics, $expectedMaximalLoad)
    {
        $maximalLoad = new MaximalLoad($this->createStrength($strength), $this->createAthletics($athletics));
        self::assertSame($expectedMaximalLoad, $maximalLoad->getValue());
        self::assertSame('maximal_load', $maximalLoad->getCode());
        self::assertSame('maximal_load', MaximalLoad::MAXIMAL_LOAD);
    }

    public function provideStrengthAthleticsAndExpectedMaximalLoad()
    {
        return [
            [0, 0, 21],
            [-4, 2, 19],
        ];
    }

    /**
     * @param int $value
     * @return \Mockery\MockInterface|Strength
     */
    private function createStrength($value)
    {
        $strength = $this->mockery(Strength::class);
        $strength->shouldReceive('getValue')
            ->andReturn($value);

        return $strength;
    }

    /**
     * @param $bonusValue
     * @return \Mockery\MockInterface|Athletics
     */
    private function createAthletics($bonusValue)
    {
        $athletics = $this->mockery(Athletics::class);
        $athletics->shouldReceive('getAthleticsBonus')
            ->andReturn($athleticsBonus = $this->mockery(IntegerInterface::class));
        $athleticsBonus->shouldReceive('getValue')
            ->andReturn($bonusValue);

        return $athletics;
    }
}