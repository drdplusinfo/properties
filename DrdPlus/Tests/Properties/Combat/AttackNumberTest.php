<?php
namespace DrdPlus\Tests\Properties\Combat;

use DrdPlus\Properties\Combat\Attack;
use DrdPlus\Properties\Combat\AttackNumber;
use DrdPlus\Properties\Combat\Partials\CombatGameCharacteristic;
use DrdPlus\Properties\Combat\Shooting;
use DrdPlus\Tests\Properties\Combat\Partials\CombatGameCharacteristicTest;

class AttackNumberTest extends CombatGameCharacteristicTest
{
    protected function createSut()
    {
        return AttackNumber::createFromAttack($this->createAttack(123));
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|Attack
     */
    private function createAttack($value)
    {
        $attack = $this->mockery(Attack::class);
        $attack->shouldReceive('getValue')
            ->andReturn($value);

        return $attack;
    }

    /**
     * @return array|string[]
     */
    protected function getExpectedInitialChangeBy()
    {
        return ['name' => 'create sut', 'arguments' => ''];
    }

    /**
     * @test
     */
    public function I_can_create_it_from_attack()
    {
        $attackNumber = AttackNumber::createFromAttack($this->createAttack(567));
        self::assertInstanceOf(AttackNumber::class, $attackNumber);
        self::assertInstanceOf(CombatGameCharacteristic::class, $attackNumber);
        self::assertSame(567, $attackNumber->getValue());
    }

    /**
     * @test
     */
    public function I_can_create_it_from_shooting()
    {
        $attackNumber = AttackNumber::createFromShooting($this->createShooting(890));
        self::assertInstanceOf(AttackNumber::class, $attackNumber);
        self::assertInstanceOf(CombatGameCharacteristic::class, $attackNumber);
        self::assertSame(890, $attackNumber->getValue());
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|Shooting
     */
    private function createShooting($value)
    {
        $attack = $this->mockery(Shooting::class);
        $attack->shouldReceive('getValue')
            ->andReturn($value);

        return $attack;
    }

}