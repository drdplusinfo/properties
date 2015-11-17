<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Properties\Base\Knack;
use DrdPlus\Properties\Derived\Senses;

class SensesTest extends AbstractTestOfDerivedProperty
{
    /**
     * #@test
     */
    public function I_can_get_property_easily()
    {
        $senses = new Senses($this->getKnack($knackValue = 123), $raceGenderSenses = 456);
        $this->assertSame('senses', $senses->getCode());
        $this->assertSame('senses', $senses::SENSES);
        $this->assertSame($knackValue + $raceGenderSenses, $senses->getValue());
        $this->assertSame((string)($knackValue + $raceGenderSenses), "$senses");

        return $senses;
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|Knack
     */
    private function getKnack($value)
    {
        return $this->createProperty(Knack::class, $value);
    }
}
