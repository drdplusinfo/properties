<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Properties\Base\Knack;
use DrdPlus\Properties\Derived\Senses;
use DrdPlus\Tests\Properties\Derived\Parts\AbstractDerivedPropertyTest;

class SensesTest extends AbstractDerivedPropertyTest
{
    /**
     * #@test
     */
    public function I_can_get_property_easily()
    {
        $senses = new Senses($this->getKnack($knackValue = 123), $raceGenderSenses = 456);
        self::assertSame('senses', $senses->getCode());
        self::assertSame('senses', Senses::SENSES);
        self::assertSame($knackValue + $raceGenderSenses, $senses->getValue());
        self::assertSame((string)($knackValue + $raceGenderSenses), "$senses");

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
