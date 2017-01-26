<?php
namespace DrdPlus\Tests\Properties\Combat;

use DrdPlus\Properties\Combat\Defense;
use DrdPlus\Properties\Combat\DefenseNumberAgainstShooting;
use DrdPlus\Properties\Body\Size;
use DrdPlus\Tests\Properties\Combat\Partials\CharacteristicForGameTest;

class DefenseNumberAgainstShootingTest extends CharacteristicForGameTest
{
    protected function createSut()
    {
        return DefenseNumberAgainstShooting::getIt($this->createDefense(123), $this->createSize(1));
    }

    /**
     * @test
     */
    public function I_can_get_property_easily()
    {
        for ($sizeValue = -5; $sizeValue < 5; $sizeValue++) {
            $defenseAgainstShooting = DefenseNumberAgainstShooting::getIt(
                $this->createDefense($defenseValue = 123),
                $this->createSize($sizeValue)
            );
            self::assertSame(
                $defenseValue - (int)round($sizeValue / 2),
                $defenseAgainstShooting->getValue()
            );
        }
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|Defense
     */
    private function createDefense($value)
    {
        $defense = \Mockery::mock(Defense::class);
        $defense->shouldReceive('getValue')
            ->andReturn($value);

        return $defense;
    }

    /**
     * @param $defense
     * @return \Mockery\MockInterface|Size
     */
    private function createSize($defense)
    {
        $size = \Mockery::mock(Size::class);
        $size->shouldReceive('getValue')
            ->andReturn($defense);

        return $size;
    }
}