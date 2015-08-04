<?php
namespace DrdPlus\Tests\Properties;

abstract class AbstractTestOfStringStoredProperty extends AbstractTestOfStoredProperty
{
    /**
     * @return string
     */
    protected function getValue()
    {
        return 'foo';
    }

}
