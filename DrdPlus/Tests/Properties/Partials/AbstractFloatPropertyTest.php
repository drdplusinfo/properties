<?php
namespace DrdPlus\Tests\Properties\Partials;

use DrdPlus\Tests\Properties\AbstractTestOfStoredProperty;

abstract class AbstractFloatPropertyTest extends AbstractTestOfStoredProperty
{

    protected function getValuesForTest()
    {
        return [0.01, 123.456];
    }
}