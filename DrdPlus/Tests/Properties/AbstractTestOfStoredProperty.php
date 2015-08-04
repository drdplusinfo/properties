<?php
namespace DrdPlus\Tests\Properties;

use Doctrineum\Scalar\Enum;

abstract class AbstractTestOfStoredProperty extends AbstractTestOfProperty
{

    protected function createInstance($propertyClass, $value)
    {
        /** @var Enum $propertyClass */
        return $propertyClass::getEnum($value);
    }

}
