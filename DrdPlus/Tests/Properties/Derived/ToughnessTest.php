<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Codes\RaceCode;
use DrdPlus\Codes\SubRaceCode;
use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Derived\Toughness;
use DrdPlus\Tables\Races\RacesTable;
use DrdPlus\Tests\Properties\Derived\Partials\AbstractDerivedPropertyTest;

class ToughnessTest extends AbstractDerivedPropertyTest
{
    /**
     * #@test
     */
    public function I_can_get_property_easily()
    {
        $toughness = new Toughness(
            $this->getStrength($strengthValue = 123),
            RaceCode::getIt(RaceCode::DWARF),
            SubRaceCode::getIt(SubRaceCode::WOOD),
            new RacesTable()
        );
        self::assertSame($strengthValue + 1, $toughness->getValue());
        self::assertSame((string)($strengthValue + 1), "$toughness");
        self::assertSame(PropertyCode::getIt(PropertyCode::TOUGHNESS), $toughness->getCode());

        return $toughness;
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|Strength
     */
    private function getStrength($value)
    {
        return $this->createProperty(Strength::class, $value);
    }
}