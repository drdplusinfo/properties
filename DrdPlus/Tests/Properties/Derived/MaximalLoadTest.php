<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Derived\MaximalLoad;
use DrdPlus\Properties\Derived\Athletics;
use DrdPlus\Tests\Properties\Derived\Partials\AbstractDerivedPropertyTest;
use Granam\Integer\IntegerInterface;

class MaximalLoadTest extends AbstractDerivedPropertyTest
{
    /**
     * @test
     * @return MaximalLoad
     */
    public function I_can_use_it()
    {
        $maximalLoad = MaximalLoad::getIt($this->createStrength(123), $this->createAthletics(456));
        self::assertInstanceOf(MaximalLoad::class, $maximalLoad);
        self::assertSame(600, $maximalLoad->getValue());

        return $maximalLoad;
    }

    /**
     * @test
     * @dataProvider provideStrengthAthleticsAndExpectedMaximalLoad
     * @param $strength
     * @param $athletics
     * @param MaximalLoad
     */
    public function I_can_get_expected_maximal_load($strength, $athletics, $expectedMaximalLoad)
    {
        $maximalLoad = MaximalLoad::getIt($this->createStrength($strength), $this->createAthletics($athletics));
        self::assertSame($expectedMaximalLoad, $maximalLoad->getValue());
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