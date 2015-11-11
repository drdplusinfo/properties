<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Derived\Toughness;
use DrdPlus\Properties\Derived\WoundsLimit;
use DrdPlus\Tables\Measurements\Wounds\WoundsTable;
use Granam\Integer\IntegerObject;

class WoundsLimitTest extends AbstractTestOfDerivedProperty
{

    /**
     * @test
     * @return WoundsLimit
     */
    public function I_can_get_property_easily()
    {
        $woundsLimit = new WoundsLimit(
            new Toughness(new Strength($strength = 1), new IntegerObject($raceToughness = 2)),
            new WoundsTable()
        );
        $this->assertSame(
            14, // simplified; bonus of wound 13 = wound of 14
            $woundsLimit->getValue()
        );

        return $woundsLimit;
    }
}
