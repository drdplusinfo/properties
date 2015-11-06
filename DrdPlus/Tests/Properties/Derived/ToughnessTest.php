<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Derived\Toughness;
use Granam\Integer\IntegerObject;

class ToughnessTest extends AbstractTestOfDerivedProperty
{
    /**
     * #@test
     */
    public function I_can_get_property_easily()
    {
        $toughness = new Toughness($this->getStrength($strengthValue = 123), new IntegerObject($raceToughness = 456));
        $this->assertSame('toughness', $toughness->getCode());
        $this->assertSame('toughness', $toughness::TOUGHNESS);
        $this->assertSame($strengthValue + $raceToughness, $toughness->getValue());
        $this->assertSame((string)($strengthValue + $raceToughness), "$toughness");

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
}
