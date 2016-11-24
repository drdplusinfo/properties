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
                'changeBy' => $this->getExpectedInitialChangeBy(),
                'result' => $combatGameCharacteristic->getValue(),
            ],
        ];
        self::assertEquals($expectedPropertyHistory, $combatGameCharacteristic->getHistory());

        $increased = $combatGameCharacteristic->add(456);
        self::assertNotEquals($combatGameCharacteristic, $increased);
        self::assertSame($combatGameCharacteristic->getValue() + 456, $increased->getValue());
        $expectedPropertyHistory[] = [
            'changeBy' => ['name' => 'i can add value', 'with' => ''],
            'result' => $increased->getValue(),
        ];
        self::assertEquals($expectedPropertyHistory, $increased->getHistory());

        $double = $increased->add($increased);
        self::assertSame($increased->getValue() * 2, $double->getValue());
        $expectedPropertyHistory[] = [
            'changeBy' => ['name' => 'i can add value', 'with' => ''],
            'result' => $double->getValue(),
        ];
        self::assertEquals($expectedPropertyHistory, $double->getHistory());
    }

    /**
     * @return array|string[]
     */
    protected function getExpectedInitialChangeBy()
    {
        return ['name' => 'create sut', 'with' => ''];
    }

    /**
     * @test
     */
    public function I_can_subtract_value()
    {
        $combatGameCharacteristic = $this->createSut();
        $expectedPropertyHistory = [
            [
                'changeBy' => $this->getExpectedInitialChangeBy(),
                'result' => $combatGameCharacteristic->getValue(),
            ],
        ];
        self::assertEquals($expectedPropertyHistory, $combatGameCharacteristic->getHistory());

        $decreased = $combatGameCharacteristic->sub(1);
        self::assertNotEquals($combatGameCharacteristic, $decreased);
        self::assertSame($combatGameCharacteristic->getValue() - 1, $decreased->getValue());
        $expectedDecreasedHistory = $expectedPropertyHistory;
        $expectedDecreasedHistory[] = [
            'changeBy' => ['name' => 'i can subtract value', 'with' => ''],
            'result' => $decreased->getValue(),
        ];
        self::assertEquals($expectedDecreasedHistory, $decreased->getHistory());

        $zeroed = $decreased->sub($decreased);
        self::assertSame(0, $zeroed->getValue());
        $expectedZeroedHistory = $expectedDecreasedHistory;
        $expectedZeroedHistory[] = [
            'changeBy' => ['name' => 'i can subtract value', 'with' => ''],
            'result' => $zeroed->getValue(),
        ];
        self::assertEquals($expectedZeroedHistory, $zeroed->getHistory());
    }


    /**
     * @test
     */
    public function Has_modifying_methods_return_value_annotated()
    {
        $reflectionClass = new \ReflectionClass($this->getSutClass());
        $classBasename = str_replace($reflectionClass->getNamespaceName() . '\\', '', $reflectionClass->getName());
        self::assertSame(<<<COMMENT
/**
 * @method {$classBasename} add(int|IntegerInterface \$value)
 * @method {$classBasename} sub(int|IntegerInterface \$value)
 */
COMMENT
            , $reflectionClass->getDocComment());
    }
}