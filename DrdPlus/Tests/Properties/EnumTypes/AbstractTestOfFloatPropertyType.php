<?php
declare(strict_types=1);

namespace DrdPlus\Tests\Properties\EnumTypes;

abstract class AbstractTestOfFloatPropertyType extends AbstractTestOfPropertyType
{
    protected function getValue()
    {
        return 123.456;
    }

}