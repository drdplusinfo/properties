<?php
namespace DrdPlus\Tests\Properties;

abstract class AbstractTestOfFloatStoredProperty extends AbstractTestOfStoredProperty
{

    protected function getValuesForTest()
    {
        return [0.01, 123.456];
    }

}
