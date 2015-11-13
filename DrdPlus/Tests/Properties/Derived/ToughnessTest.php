<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Codes\RaceCodes;
use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Derived\Toughness;
use DrdPlus\Tables\Races\RacesTable;

class ToughnessTest extends AbstractTestOfDerivedProperty
{
    /**
     * #@test
     */
    public function I_can_get_property_easily()
    {
        $toughness = new Toughness(
            $this->getStrength($strengthValue = 123),
            RaceCodes::DWARF,
            RaceCodes::WOOD,
            new RacesTable()
        );
        $this->assertSame('toughness', $toughness->getCode());
        $this->assertSame('toughness', $toughness::TOUGHNESS);
        $this->assertSame($strengthValue + 1, $toughness->getValue());
        $this->assertSame((string)($strengthValue + 1), "$toughness");

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
