<?php
declare(strict_types=1);/** be strict for parameter types, https://www.quora.com/Are-strict_types-in-PHP-7-not-a-bad-idea */
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Base\Knack;
use DrdPlus\Properties\Derived\Beauty;
use DrdPlus\Tests\Properties\Derived\Partials\AspectOfVisageTest;

class BeautyTest extends AspectOfVisageTest
{
    /**
     * @test
     * @return Beauty
     */
    public function I_can_use_it()
    {
        $beauty = Beauty::getIt(
            $this->getAgility($agilityValue = 123),
            $this->getKnack($knackValue = 456),
            $this->getCharisma($charismaValue = 789)
        );
        self::assertSame(PropertyCode::getIt(PropertyCode::BEAUTY), $beauty->getCode());
        self::assertSame($this->calculateValue($agilityValue, $knackValue, $charismaValue), $beauty->getValue());
        self::assertSame((string)$this->calculateValue($agilityValue, $knackValue, $charismaValue), (string)$beauty);

        return $beauty;
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|Agility
     */
    private function getAgility($value)
    {
        return $this->createProperty(Agility::class, $value);
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|Knack
     */
    private function getKnack($value)
    {
        return $this->createProperty(Knack::class, $value);
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