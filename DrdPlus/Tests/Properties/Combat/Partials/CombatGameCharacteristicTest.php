<?php
namespace DrdPlus\Tests\Properties\Combat\Partials;

use DrdPlus\Properties\Combat\Attack;
use DrdPlus\Properties\Combat\Partials\CombatGameCharacteristic;
use Granam\Integer\IntegerInterface;
use Granam\Tests\Tools\TestWithMockery;

abstract class CombatGameCharacteristicTest extends TestWithMockery
{
    /**
     * @test
     */
    public function I_can_use_it_as_integer_object()
    {
        $sut = $this->createSut();
        self::assertInstanceOf(IntegerInterface::class, $sut);
        self::assertSame((string)$sut->getValue(), (string)$sut);
    }

    /**
     * @return CombatGameCharacteristic
     */
    abstract protected function createSut();

    /**
     * @return Attack|CombatGameCharacteristic|string
     */
    protected function getSutClass()
    {
        return preg_replace('~[\\\]Tests([\\\].+)Test$~', '$1', static::class);
    }

    /**
     * @test
     */
    public function I_can_add_value()
    {
        $combatGameCharacteristic = $this->createSut();
        $expectedPropertyHistory = [
            [
                'changeBy' => $this->getExpectedChangeBy(),
                'result' => $combatGameCharacteristic->getValue(),
            ],
        ];
        self::assertEquals($expectedPropertyHistory, $combatGameCharacteristic->getHistory());

        $increased = $combatGameCharacteristic->add(456);
        self::assertNotEquals($combatGameCharacteristic, $increased);
        self::assertSame($combatGameCharacteristic->getValue() + 456, $increased->getValue());
        $expectedPropertyHistory[] = [
            'changeBy' => ['name' => 'i can add value', 'arguments' => ''],
            'result' => $increased->getValue(),
        ];
        self::assertEquals($expectedPropertyHistory, $increased->getHistory());


        $double = $increased->add($increased);
        self::assertSame($increased->getValue() * 2, $double->getValue());
        $expectedPropertyHistory[] = [
            'changeBy' => ['name' => 'i can add value', 'arguments' => ''],
            'result' => $double->getValue(),
        ];
        self::assertEquals($expectedPropertyHistory, $double->getHistory());
    }

    /**
     * @return array|string[]
     */
    protected function getExpectedChangeBy()
    {
        return ['name' => 'create sut', 'arguments' => ''];
    }

    /**
     * @test
     */
    public function I_can_subtract_value()
    {
        $combatGameCharacteristic = $this->createSut();
        $decreased = $combatGameCharacteristic->sub(1);
        self::assertNotEquals($combatGameCharacteristic, $decreased);
        self::assertSame($combatGameCharacteristic->getValue() - 1, $decreased->getValue());
        $zeroed = $decreased->sub($decreased);
        self::assertSame(0, $zeroed->getValue());
    }
}