<?php
namespace DrdPlus\Tests\Properties\Combat;

use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Body\Size;
use DrdPlus\Properties\Combat\Defense;
use DrdPlus\Tests\Properties\Combat\Partials\CombatCharacteristicTest;

class DefenseTest extends CombatCharacteristicTest
{
    protected function createSut()
    {
        return Defense::getIt($this->createAgility(123), $this->createSize(1));
    }

    /**
     * @test
     */
    public function I_can_get_property_easily()
    {
        for ($sizeValue = -5; $sizeValue < 5; $sizeValue++) {
            $defense = Defense::getIt(
                $this->createAgility($agilityValue = 123),
                $this->createSize($sizeValue)
            );
            self::assertSame((int)ceil($agilityValue / 2), $defense->getValue());
            self::assertSame((int)ceil($agilityValue / 2) - (int)round($sizeValue / 2), $defense->getValueAgainstShooting());
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

    /**
     * @param $value
     * @return \Mockery\MockInterface|Size
     */
    private function createSize($value)
    {
        $size = \Mockery::mock(Size::class);
        $size->shouldReceive('getValue')
            ->andReturn($value);

        return $size;
    }
}