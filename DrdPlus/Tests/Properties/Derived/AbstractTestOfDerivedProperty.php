<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Tests\Properties\AbstractTestOfProperty;

class AbstractTestOfDerivedProperty extends AbstractTestOfProperty
{

    protected function getValuesForTest()
    {
        throw new \LogicException('Should not be called');
    }
}
