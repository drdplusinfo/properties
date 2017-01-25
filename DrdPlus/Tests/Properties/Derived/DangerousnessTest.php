<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Base\Will;
use DrdPlus\Properties\Derived\Dangerousness;
use DrdPlus\Tests\Properties\Derived\Partials\AspectOfVisageTest;

class DangerousnessTest extends AspectOfVisageTest
{

    /**
     * #@test
     */
    public function I_can_get_property_easily()
    {
        $dangerousness = new Dangerousness($this->getStrength($strengthValue = 123), $this->getWill($willValue = 456), $this->getCharisma($charismaValue = 789));
        self::assertSame(PropertyCode::getIt(PropertyCode::DANGEROUSNESS), $dangerousness->getCode());
        self::assertSame($this->calculateValue($strengthValue, $willValue, $charismaValue), $dangerousness->getValue());
        self::assertSame((string)$this->calculateValue($strengthValue, $willValue, $charismaValue), "$dangerousness");

        return $dangerousness;
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

    /**
     * @param $value
     *
     * @return \Mockery\MockInterface|Charisma
     */
    private function getCharisma($value)
    {
        return $this->createProperty(Charisma::class, $value);
    }
}
