<?php
declare(strict_types=1);
namespace DrdPlus\Tests\Properties\EnumTypes;

abstract class AbstractTestOfStringPropertyType extends AbstractTestOfPropertyType
{
    protected function getValue()
    {
        return 'foo';
    }

}
