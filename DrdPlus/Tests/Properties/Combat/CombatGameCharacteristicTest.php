<?php
namespace DrdPlus\Tests\Properties\Combat;

use DrdPlus\Properties\Combat\AttackNumber;
use DrdPlus\Properties\Combat\CombatGameCharacteristic;
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
}