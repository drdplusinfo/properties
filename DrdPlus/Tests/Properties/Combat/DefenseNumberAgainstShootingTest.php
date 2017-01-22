<?php
namespace DrdPlus\Tests\Properties\Combat;

use DrdPlus\Properties\Combat\DefenseNumber;
use DrdPlus\Properties\Combat\DefenseNumberAgainstShooting;
use DrdPlus\Properties\Body\Size;
use DrdPlus\Tests\Properties\Combat\Partials\CombatCharacteristicTest;

class DefenseNumberAgainstShootingTest extends CombatCharacteristicTest
{
    protected function createSut()
    {
        return new DefenseNumberAgainstShooting($this->createDefense(123), $this->createSize(1));
    }

    /**
     * @return array|string[]
     */
    protected function getExpectedInitialChangeBy()
    {
        return [
            'name' => 'create sut',
             'with' => ''
        ];
    }

    /**
     * @test
     */
    public function My_shooting_defense_depends_on_agility_and_size()
    {
        for ($sizeValue = -5; $sizeValue < 5; $sizeValue++) {
            $defenseAgainstShooting = new DefenseNumberAgainstShooting(
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
     * @return \Mockery\MockInterface|DefenseNumber
     */
    private function createDefense($value)
    {
        $agility = \Mockery::mock(DefenseNumber::class);
        $agility->shouldReceive('getValue')
            ->andReturn($value);

        return $agility;
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