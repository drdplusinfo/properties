<?php
declare(strict_types=1);/** be strict for parameter types, https://www.quora.com/Are-strict_types-in-PHP-7-not-a-bad-idea */
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Base\Will;
use DrdPlus\Properties\Derived\Endurance;
use DrdPlus\Tests\Properties\Derived\Partials\AbstractDerivedPropertyTest;

class EnduranceTest extends AbstractDerivedPropertyTest
{
    /**
     * @test
     * @return Endurance
     */
    public function I_can_use_it()
    {
        $endurance = Endurance::getIt(
            $this->getStrength($agilityValue = 123),
            $this->getWill($knackValue = 456)
        );
        self::assertSame(PropertyCode::getIt(PropertyCode::ENDURANCE), $endurance->getCode());
        self::assertSame((int)round(($agilityValue + $knackValue) / 2), $endurance->getValue());
        self::assertSame((string)round(($agilityValue + $knackValue) / 2), (string)$endurance);

        return $endurance;
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|Strength
     */
    private function getStrength($value)
    {
        return $this->createProperty(Strength::class, $value);
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|Will
     */
    private function getWill($value)
    {
        return $this->createProperty(Will::class, $value);
    }
}