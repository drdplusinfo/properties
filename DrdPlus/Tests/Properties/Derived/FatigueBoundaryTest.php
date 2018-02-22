<?php
declare(strict_types=1);/** be strict for parameter types, https://www.quora.com/Are-strict_types-in-PHP-7-not-a-bad-idea */
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Properties\Derived\Endurance;
use DrdPlus\Properties\Derived\FatigueBoundary;
use DrdPlus\Tables\Measurements\Fatigue\Fatigue;
use DrdPlus\Tables\Measurements\Fatigue\FatigueBonus;
use DrdPlus\Tables\Measurements\Fatigue\FatigueTable;
use DrdPlus\Tables\Tables;
use DrdPlus\Tests\Properties\Derived\Partials\AbstractDerivedPropertyTest;

class FatigueBoundaryTest extends AbstractDerivedPropertyTest
{

    /**
     * @test
     * @return FatigueBoundary
     */
    public function I_can_use_it()
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        $fatigueBoundary = FatigueBoundary::getIt(
            $this->createEndurance(123),
            $this->createTablesWithFatigueTable(133, 456)
        );
        self::assertSame(456, $fatigueBoundary->getValue());
        self::assertSame(PropertyCode::getIt(PropertyCode::FATIGUE_BOUNDARY), $fatigueBoundary->getCode());

        return $fatigueBoundary;
    }

    /**
     * @param int $value
     * @return \Mockery\MockInterface|Endurance
     */
    private function createEndurance($value)
    {
        $endurance = $this->mockery(Endurance::class);
        $endurance->shouldReceive('getValue')
            ->andReturn($value);

        return $endurance;
    }

    /**
     * @param int $expectedFatigueBonusValue
     * @param int $fatigueValue
     * @return \Mockery\MockInterface|Tables
     */
    private function createTablesWithFatigueTable($expectedFatigueBonusValue, $fatigueValue)
    {
        $tables = $this->mockery(Tables::class);
        $tables->shouldReceive('getFatigueTable')
            ->andReturn($fatigueTable = $this->mockery(FatigueTable::class));
        $fatigueTable->shouldReceive('toFatigue')
            ->zeroOrMoreTimes()
            ->with($this->type(FatigueBonus::class))
            ->andReturnUsing(function (FatigueBonus $fatigueBonus) use ($expectedFatigueBonusValue, $fatigueValue) {
                self::assertSame($expectedFatigueBonusValue, $fatigueBonus->getValue());

                $fatigue = $this->mockery(Fatigue::class);
                $fatigue->shouldReceive('getValue')
                    ->andReturn($fatigueValue);

                return $fatigue;
            });

        return $tables;
    }
}