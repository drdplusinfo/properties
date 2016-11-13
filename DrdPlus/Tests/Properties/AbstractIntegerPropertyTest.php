<?php
namespace DrdPlus\Tests\Properties;

use DrdPlus\Properties\AbstractIntegerProperty;
use Granam\Tools\ValueDescriber;

abstract class AbstractIntegerPropertyTest extends AbstractTestOfStoredProperty
{

    /**
     * @return int[]
     */
    protected function getValuesForTest()
    {
        return [0, 123456];
    }

    /**
     * @test
     * @dataProvider provideSomeArguments
     * @param $justSomeArgument
     * @param $justAnotherArgument
     */
    public function I_can_add_value($justSomeArgument, $justAnotherArgument)
    {
        $propertyClass = $this->getSutClass();
        /** @var AbstractIntegerProperty $property */
        $property = $propertyClass::getIt(123);
        $propertyHistory = $property->getHistory();
        $expectedChangeBy = [
            'name' => 'i can add value',
            'arguments' => implode(
                ',',
                [ValueDescriber::describe($justSomeArgument), ValueDescriber::describe($justAnotherArgument)]
            ),
        ];
        $expectedPropertyHistory = [
            [
                'changeBy' => $expectedChangeBy,
                'result' => $property->getValue(),
            ],
        ];
        self::assertEquals($expectedPropertyHistory, $propertyHistory);

        $greater = $property->add(456);
        $greaterHistory = $greater->getHistory();
        $expectedGreaterHistoryChange = [
            'changeBy' => $expectedChangeBy,
            'result' => $greater->getValue(),
        ];
        $expectedGreaterHistory = $expectedPropertyHistory;
        $expectedGreaterHistory[] = $expectedGreaterHistoryChange;
        self::assertEquals($expectedGreaterHistory, $greaterHistory);
        self::assertSame(123, $property->getValue());
        self::assertNotEquals($property, $greater);
        self::assertSame(579, $greater->getValue());

        $double = $greater->add($greater);
        $doubleHistory = $double->getHistory();
        $expectedDoubleHistoryChange = [
            'changeBy' => $expectedChangeBy,
            'result' => $double->getValue(),
        ];
        $expectedDoubleHistory = $expectedGreaterHistory;
        $expectedDoubleHistory[] = $expectedDoubleHistoryChange;
        self::assertEquals($expectedDoubleHistory, $doubleHistory);
        self::assertSame(1158, $double->getValue());
    }

    public function provideSomeArguments()
    {
        return [
            ['foo', new \DateTime()],
        ];
    }

    /**
     * @test
     * @dataProvider provideSomeArguments
     * @param $justSomeArgument
     * @param $justAnotherArgument
     */
    public function I_can_subtract_value($justSomeArgument, $justAnotherArgument)
    {
        $propertyClass = $this->getSutClass();
        /** @var AbstractIntegerProperty $property */
        $property = $propertyClass::getIt(123);
        $propertyHistory = $property->getHistory();
        $expectedChangeBy = [
            'name' => 'i can subtract value',
            'arguments' => implode(
                ',',
                [ValueDescriber::describe($justSomeArgument), ValueDescriber::describe($justAnotherArgument)]
            ),
        ];
        $expectedPropertyHistory = [
            [
                'changeBy' => $expectedChangeBy,
                'result' => $property->getValue(),
            ],
        ];
        self::assertEquals($expectedPropertyHistory, $propertyHistory);

        $lesser = $property->sub(456);
        self::assertSame(123, $property->getValue());
        self::assertNotEquals($property, $lesser);
        self::assertSame(-333, $lesser->getValue());
        $lesserHistory = $lesser->getHistory();
        $expectedLesserHistoryChange = [
            'changeBy' => $expectedChangeBy,
            'result' => $lesser->getValue(),
        ];
        $expectedLesserHistory = $expectedPropertyHistory;
        $expectedLesserHistory[] = $expectedLesserHistoryChange;
        self::assertEquals($expectedLesserHistory, $lesserHistory);

        $zero = $lesser->sub($lesser);
        $zeroHistory = $zero->getHistory();
        $expectedLesserHistoryChange = [
            'changeBy' => $expectedChangeBy,
            'result' => $zero->getValue(),
        ];
        $expectedZeroHistory = $expectedLesserHistory;
        $expectedZeroHistory[] = $expectedLesserHistoryChange;
        self::assertEquals($expectedZeroHistory, $zeroHistory);
        self::assertSame(0, $zero->getValue());
    }

}