<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Properties\Base\Intelligence;
use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Base\Will;
use DrdPlus\Properties\Derived\Dignity;
use DrdPlus\Tests\Properties\Derived\Partials\AspectOfVisageTest;

class DignityTest extends AspectOfVisageTest
{

    /**
     * @test
     * @return Dignity
     */
    public function I_can_use_it()
    {
        $dignity = Dignity::getIt(
            $this->getIntelligence($agilityValue = 123),
            $this->getWill($knackValue = 456),
            $this->getCharisma($charismaValue = 789)
        );
        self::assertSame(PropertyCode::getIt(PropertyCode::DIGNITY), $dignity->getCode());
        self::assertSame($this->calculateValue($agilityValue, $knackValue, $charismaValue), $dignity->getValue());
        self::assertSame((string)$this->calculateValue($agilityValue, $knackValue, $charismaValue), "$dignity");

        return $dignity;
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|Intelligence
     */
    private function getIntelligence($value)
    {
        return $this->createProperty(Intelligence::class, $value);
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|Will
     */
    private function getWill($value)
    {
        return $this->createProperty(Will::class, $value);
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|Charisma
     */
    private function getCharisma($value)
    {
        return $this->createProperty(Charisma::class, $value);
    }
}