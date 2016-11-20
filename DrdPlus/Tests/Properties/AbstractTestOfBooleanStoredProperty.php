<?php
namespace DrdPlus\Tests\Properties;

use DrdPlus\Properties\Native\NativeProperty;

abstract class AbstractTestOfBooleanStoredProperty extends AbstractTestOfStoredProperty
{

    /**
     * @return bool[]
     */
    protected function getValuesForTest()
    {
        return [true, false];
    }

    /**
     * @test
     */
    public function I_can_get_history_of_its_creation()
    {
        $propertyClass = $this->getSutClass();
        $property = false;
        foreach ($this->getValuesForTest() as $value) {
            /** @var NativeProperty $property */
            $property = $propertyClass::getIt($value);
            self::assertEquals(
                [
                    ['changeBy' => ['name' => 'i can get history of its creation', 'with' => ''], 'result' => $value],
                ],
                $property->getHistory()
            );
        }

        return $property;
    }
}
