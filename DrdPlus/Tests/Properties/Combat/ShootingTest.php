<?php
namespace DrdPlus\Tests\Properties\Combat;

use DrdPlus\Properties\Combat\Shooting;
use DrdPlus\Properties\Base\Knack;

class ShootingTest extends CombatGameCharacteristicTest
{
    protected function createSut()
    {
        return new Shooting($this->createKnack(123));
    }

    /**
     * @test
     * @dataProvider getShootingByKnack
     * @param $knack
     * @param $shootingValue
     */
    public function I_can_get_shooting($knack, $shootingValue)
    {
        $shooting = new Shooting($this->createKnack($knack));
        self::assertSame($shootingValue, $shooting->getValue());
    }

    public function getShootingByKnack()
    {
        return [
            [-2, -1],
            [-1, -1],
            [0, 0],
            [1, 0],
            [2, 1],
            [3, 1],
            [5, 2],
            [11, 5],
        ];
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|Knack
     */
    private function createKnack($value)
    {
        $knack = \Mockery::mock(Knack::class);
        $knack->shouldReceive('getValue')
            ->andReturn($value);

        return $knack;
    }
}