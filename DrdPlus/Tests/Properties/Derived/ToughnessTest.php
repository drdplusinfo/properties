<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Codes\RaceCode;
use DrdPlus\Codes\SubRaceCode;
use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Derived\Toughness;
use DrdPlus\Tables\Races\RacesTable;
use DrdPlus\Tests\Properties\Derived\Parts\AbstractDerivedPropertyTest;

class ToughnessTest extends AbstractDerivedPropertyTest
{
    /**
     * #@test
     */
    public function I_can_get_property_easily()
    {
        $toughness = new Toughness(
            $this->getStrength($strengthValue = 123),
            RaceCode::DWARF,
            SubRaceCode::WOOD,
            new RacesTable()
        );
        self::assertSame('toughness', $toughness->getCode());
        self::assertSame('toughness', Toughness::TOUGHNESS);
        self::assertSame($strengthValue + 1, $toughness->getValue());
        self::assertSame((string)($strengthValue + 1), "$toughness");

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
