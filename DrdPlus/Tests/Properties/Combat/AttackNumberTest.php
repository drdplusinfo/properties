<?php
namespace DrdPlus\Tests\Properties\Combat;

use DrdPlus\Properties\Combat\AttackNumber;
use DrdPlus\Properties\Base\Agility;

class AttackNumberTest extends CombatGameCharacteristicTest
{
    protected function createSut()
    {
        return new AttackNumber($this->createAgility(123));
    }

    /**
     * @test
     */
    public function My_attack_depends_on_agility()
    {
        for ($value = -5; $value < 10; $value++) {
            $attack = new AttackNumber($this->createAgility($value));
            self::assertSame((int)floor($value / 2), $attack->getValue());
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