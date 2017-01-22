<?php
namespace DrdPlus\Tests\Properties\Combat;

use DrdPlus\Properties\Combat\EncounterRange;
use DrdPlus\Properties\Combat\MaximalRange;
use DrdPlus\Properties\Combat\Partials\CombatCharacteristic;
use DrdPlus\Tests\Properties\Combat\Partials\AbstractRangeTest;

class MaximalRangeTest extends AbstractRangeTest
{
    /**
     * @param $value
     * @return MaximalRange
     */
    protected function createRangeSut($value)
    {
        return MaximalRange::createForMeleeWeapon($this->createEncounterRange($value));
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|EncounterRange
     */
    private function createEncounterRange($value)
    {
        $encounterRange = $this->mockery(EncounterRange::class);
        $encounterRange->shouldReceive('getValue')
            ->andReturn($value);

        return $encounterRange;
    }

    /**
     * @test
     */
    public function I_can_create_it_for_melee_weapon()
    {
        $maximalRange = MaximalRange::createForMeleeWeapon($this->createEncounterRange(123));
        self::assertInstanceOf(MaximalRange::class, $maximalRange);
        self::assertInstanceOf(CombatCharacteristic::class, $maximalRange);
        self::assertSame(123, $maximalRange->getValue(), 'Value should be without a change');
    }

    /**
     * @test
     */
    public function I_can_create_it_for_range_weapon()
    {
        $maximalRange = MaximalRange::createForRangedWeapon($this->createEncounterRange(123));
        self::assertInstanceOf(MaximalRange::class, $maximalRange);
        self::assertInstanceOf(CombatCharacteristic::class, $maximalRange);
        self::assertSame(135, $maximalRange->getValue(), 'Value should be increased by twelve');
    }

}