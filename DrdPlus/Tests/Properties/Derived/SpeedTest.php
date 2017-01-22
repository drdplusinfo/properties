<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Body\Height;
use DrdPlus\Properties\Derived\Speed;
use DrdPlus\Tests\Properties\Derived\Partials\AbstractDerivedPropertyTest;

class SpeedTest extends AbstractDerivedPropertyTest
{
    /**
     * @test
     */
    public function I_can_get_property_easily()
    {
        $speed = new Speed(
            $this->getStrength($strengthValue = 123),
            $this->getAgility($agilityValue = 456),
            $this->getHeight($heightValue = 789)
        );
        self::assertSame((int)round(($strengthValue + $agilityValue) / 2) + ($heightValue / 3 - 2), $speed->getValue());
        self::assertSame((string)(round(($strengthValue + $agilityValue) / 2) + ($heightValue / 3 - 2)), "$speed");
        self::assertSame(PropertyCode::getIt(PropertyCode::SPEED), $speed->getCode());

        return $speed;
    }

    /**
     * @test
     * @dataProvider sizesToSpeed
     *
     * @param int $size
     * @param int $speedModifier
     *
     * @return Speed
     */
    public function I_can_get_speed_for_any_size($size, $speedModifier)
    {
        $speed = new Speed(
            $this->getStrength($strengthValue = 123),
            $this->getAgility($agilityValue = 456),
            $this->getHeight($size)
        );
        self::assertSame((int)round(($strengthValue + $agilityValue) / 2) + $speedModifier, $speed->getValue());
        self::assertSame((string)(round(($strengthValue + $agilityValue) / 2) + $speedModifier), "$speed");

        return $speed;
    }

    public function sizesToSpeed()
    {
        return [
            [-6, -4],
            [-5, -3],
            [-4, -3],
            [-3, -3],
            [-2, -2],
            [-1, -2],
            [0, -2],
            [1, -1],
            [2, -1],
            [3, -1],
            [4, 0],
            [5, 0],
            [6, 0],
            [7, 1],
            [8, 1],
            [9, 1],
            [10, 2],
        ];
    }

    /**
     * @param $value
     *
     * @return \Mockery\MockInterface|Strength
     */
    private function getStrength($value)
    {
        return $this->createProperty(Strength::class, $value);
    }

    /**
     * @param $value
     *
     * @return \Mockery\MockInterface|Agility
     */
    private function getAgility($value)
    {
        return $this->createProperty(Agility::class, $value);
    }

    /**
     * @param $value
     *
     * @return \Mockery\MockInterface|Height
     */
    private function getHeight($value)
    {
        return $this->createProperty(Height::class, $value);
    }

}