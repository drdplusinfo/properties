<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Tests\Properties\AbstractTestOfProperty;

class AbstractTestOfDerivedProperty extends AbstractTestOfProperty
{

    protected function createInstance($propertyClass, $value)
    {
        return new $propertyClass($value);
    }

    protected function getValue()
    {
        return 123;
    }

}
