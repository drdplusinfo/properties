<?php
namespace DrdPlus\Tests\Properties;

abstract class AbstractTestOfBooleanStoredProperty extends AbstractTestOfStoredProperty
{

    /**
     * @return bool[]
     */
    protected function getValuesForTest()
    {
        return [true, false];
    }

}
