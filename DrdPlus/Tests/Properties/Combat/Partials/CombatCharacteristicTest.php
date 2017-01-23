<?php
namespace DrdPlus\Tests\Properties\Combat\Partials;

use DrdPlus\Properties\Combat\Partials\CombatCharacteristic;
use Granam\Integer\IntegerInterface;
use Granam\Tests\Tools\TestWithMockery;

abstract class CombatCharacteristicTest extends TestWithMockery
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
     * @return CombatCharacteristic
     */
    abstract protected function createSut();

    /**
     * @test
     */
    public function I_can_add_value()
    {
        $combatCharacteristic = $this->createSut();
        $expectedPropertyHistory = [
            [
                'changeBy' => $this->getExpectedInitialChangeBy(),
                'result' => $combatCharacteristic->getValue(),
            ],
        ];
        self::assertEquals($expectedPropertyHistory, $combatCharacteristic->getHistory());

        $increased = $combatCharacteristic->add(456);
        self::assertNotEquals($combatCharacteristic, $increased);
        self::assertSame($combatCharacteristic->getValue() + 456, $increased->getValue());
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
        $combatCharacteristic = $this->createSut();
        $expectedPropertyHistory = [
            [
                'changeBy' => $this->getExpectedInitialChangeBy(),
                'result' => $combatCharacteristic->getValue(),
            ],
        ];
        self::assertEquals($expectedPropertyHistory, $combatCharacteristic->getHistory());

        $decreased = $combatCharacteristic->sub(1);
        self::assertNotEquals($combatCharacteristic, $decreased);
        self::assertSame($combatCharacteristic->getValue() - 1, $decreased->getValue());
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
        $reflectionClass = new \ReflectionClass(self::getSutClass());
        $classBasename = preg_replace('~^.+[\\\](\w+)$~', '$1', self::getSutClass());
        self::assertSame(<<<ANNOTATION
/**
 * @method {$classBasename} add(int | IntegerInterface \$value)
 * @method {$classBasename} sub(int | IntegerInterface \$value)
 */
ANNOTATION
            , (string)$reflectionClass->getDocComment());
    }
}