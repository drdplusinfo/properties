<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Base\Knack;
use DrdPlus\Properties\Derived\Beauty;

class BeautyTest extends AbstractTestOfAspectOfVisage
{

    /**
     * #@test
     */
    public function I_can_create_beauty()
    {
        $beauty = new Beauty($this->getAgility($agilityValue = 123), $this->getKnack($knackValue = 456), $this->getCharisma($charismaValue = 789));
        $this->assertSame('beauty', $beauty->getCode());
        $this->assertSame('beauty', $beauty->getCode());
        $this->assertSame($this->calculateValue($agilityValue, $knackValue, $charismaValue), $beauty->getValue());
        $this->assertSame((string)$this->calculateValue($agilityValue, $knackValue, $charismaValue), "$beauty");
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
     * @param $className
     * @param $value
     * @return \Mockery\MockInterface
     */
    private function createProperty($className, $value)
    {
        $property = $this->mockery($className);
        /** @noinspection PhpMethodParametersCountMismatchInspection */
        $property->shouldReceive('getValue')
            ->atLeast()->once()
            ->andReturn($value);

        return $property;
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
