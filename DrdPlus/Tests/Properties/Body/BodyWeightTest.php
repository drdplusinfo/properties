<?php
namespace DrdPlus\Tests\Properties\Body;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Properties\Body\BodyWeight;
use DrdPlus\Properties\Body\WeightInKg;
use DrdPlus\Tables\Measurements\Weight\WeightBonus;
use DrdPlus\Tests\Properties\PropertyTest;

class BodyWeightTest extends PropertyTest
{
    use BodyPropertyTest;

    /**
     * @return string
     */
    protected function getExpectedCodeClass(): string
    {
        return PropertyCode::class;
    }

    /**
     * @test
     */
    public function I_can_get_property_easily(): void
    {
        $bodyWeight = BodyWeight::getIt($this->createWeightBonus(123));
        self::assertInstanceOf(BodyWeight::class, $bodyWeight);
        self::assertSame(123, $bodyWeight->getValue());
        self::assertSame('123', (string)$bodyWeight);
        self::assertSame(PropertyCode::getIt(PropertyCode::BODY_WEIGHT), $bodyWeight->getCode());
    }

    /**
     * @param int $value
     * @return WeightInKg|\Mockery\MockInterface
     */
    protected function createValueForProperty(int $value)
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