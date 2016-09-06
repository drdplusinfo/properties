<?php
namespace DrdPlus\Tests\Properties\Combat\Partials;

use DrdPlus\Properties\Combat\AttackNumber;
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
     * @return AttackNumber|CombatGameCharacteristic|string
     */
    protected function getSutClass()
    {
        return preg_replace('~[\\\]Tests([\\\].+)Test$~', '$1', static::class);
    }

    /**
     * @test
     */
    public function I_can_add_value_and_subtract_from_it()
    {
        $sut = $this->createSut();
        $increased = $sut->add(123);
        self::assertNotEquals($sut, $increased);
        self::assertSame($sut->getValue() + 123, $increased->getValue());
        $double = $increased->add($increased);
        self::assertSame($increased->getValue() * 2, $double->getValue());

        $decreased = $sut->sub(456);
        self::assertNotEquals($sut, $decreased);
        self::assertSame($sut->getValue() - 456, $decreased->getValue());
        $zeroed = $decreased->sub($decreased);
        self::assertSame(0, $zeroed->getValue());
    }
}