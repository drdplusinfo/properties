<?php
namespace DrdPlus\Tests\Properties;

abstract class AbstractTestOfStringStoredProperty extends AbstractTestOfStoredProperty
{
    /**
     * @return string
     */
    protected function getValuesForTest()
    {
        return ['foo'];
    }

}
