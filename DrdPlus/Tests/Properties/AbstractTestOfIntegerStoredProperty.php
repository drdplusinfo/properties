<?php
namespace DrdPlus\Tests\Properties;

abstract class AbstractTestOfIntegerStoredProperty extends AbstractTestOfStoredProperty
{

    /**
     * @return int
     */
    protected function getValuesForTest()
    {
        return [0, 123456];
    }

}
