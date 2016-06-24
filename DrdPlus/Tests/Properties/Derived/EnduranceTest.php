<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Base\Will;
use DrdPlus\Properties\Derived\Endurance;

class EnduranceTest extends AbstractTestOfDerivedProperty
{
    /**
     * #@test
     */
    public function I_can_get_property_easily()
    {
        $endurance = new Endurance($this->getStrength($agilityValue = 123), $this->getWill($knackValue = 456));
        self::assertSame('endurance', $endurance->getCode());
        self::assertSame('endurance', Endurance::ENDURANCE);
        self::assertSame((int)round(($agilityValue + $knackValue) / 2), $endurance->getValue());
        self::assertSame((string)round(($agilityValue + $knackValue) / 2), "$endurance");

        return $endurance;
    }

    /**
     * @param $value
     *
     * @return \Mockery\MockInterface|Strength
     */
    private function getStrength($value)
    {
        return $this->createProperty(Strength::class, $value);
    }

    /**
     * @param $value
     *
     * @return \Mockery\MockInterface|Will
     */
    private function getWill($value)
    {
        return $this->createProperty(Will::class, $value);
    }
}
