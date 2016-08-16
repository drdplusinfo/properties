<?php
namespace DrdPlus\Tests\Properties\Combat;

use DrdPlus\Properties\Combat\DefenseNumber;
use DrdPlus\Properties\Base\Agility;

class DefenseNumberTest extends CombatGameCharacteristicTest
{
    protected function createSut()
    {
        return new DefenseNumber($this->createAgility(123));
    }

    /**
     * @test
     */
    public function My_defense_depends_on_agility()
    {
        for ($value = -5; $value < 10; $value++) {
            $attack = new DefenseNumber($this->createAgility($value));
            self::assertSame((int)ceil($value / 2), $attack->getValue());
        }
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|Agility
     */
    private function createAgility($value)
    {
        $agility = \Mockery::mock(Agility::class);
        $agility->shouldReceive('getValue')
            ->andReturn($value);

        return $agility;
    }
}