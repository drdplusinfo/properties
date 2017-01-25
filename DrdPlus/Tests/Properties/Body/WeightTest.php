<?php
namespace DrdPlus\Tests\Properties\Body;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Properties\Body\Weight;
use DrdPlus\Properties\Body\WeightInKg;
use DrdPlus\Tables\Measurements\Weight\WeightBonus;
use DrdPlus\Tables\Measurements\Weight\WeightTable;
use DrdPlus\Tables\Tables;
use DrdPlus\Tests\Properties\PropertyTest;
use \DrdPlus\Tables\Measurements\Weight\Weight as WeightMeasurement;

class WeightTest extends PropertyTest
{
    use BodyPropertyTest;

    /**
     * @return string
     */
    protected function getExpectedCodeClass()
    {
        return PropertyCode::class;
    }

    /**
     * @test
     */
    public function I_can_get_property_easily()
    {
        $tables = $this->createTablesWithWeightTable(
            function (WeightMeasurement $weightMeasurement) {
                self::assertSame(123.0, $weightMeasurement->getValue());
                self::assertSame(WeightMeasurement::KG, $weightMeasurement->getUnit());

                return $this->createWeightBonus(456);
            }
        );
        $height = Weight::getIt($this->createWeightInKg(123), $tables);
        self::assertInstanceOf(Weight::class, $height);
        self::assertSame(456, $height->getValue());
        self::assertSame('456', (string)$height);
        self::assertSame(PropertyCode::getIt($this->getExpectedPropertyCode()), $height->getCode());
    }

    /**
     * @param int $value
     * @return WeightInKg|\Mockery\MockInterface
     */
    protected function createValueForProperty($value)
    {
        return $this->createWeightInKg($value);
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|WeightInKg
     */
    private function createWeightInKg($value)
    {
        $heightInCm = $this->mockery(WeightInKg::class);
        $heightInCm->shouldReceive('getValue')
            ->andReturn($value);

        return $heightInCm;
    }

    /**
     * @param \Closure $toBonus
     * @return \Mockery\MockInterface|Tables
     */
    private function createTablesWithWeightTable(\Closure $toBonus)
    {
        $tables = $this->mockery(Tables::class);
        $tables->shouldReceive('getWeightTable')
            ->andReturn($distanceTable = $this->mockery(WeightTable::class));
        $distanceTable->shouldReceive('toBonus')
            ->andReturnUsing($toBonus);

        return $tables;
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|WeightBonus
     */
    private function createWeightBonus($value)
    {
        $distanceBonus = $this->mockery(WeightBonus::class);
        $distanceBonus->shouldReceive('getValue')
            ->andReturn($value);

        return $distanceBonus;
    }
}