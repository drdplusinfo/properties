<?php
namespace DrdPlus\Tests\Properties\RemarkableSenses;

use DrdPlus\Tests\Properties\AbstractTestOfStringStoredProperty;

abstract class AbstractTestOfRemarkableSense extends AbstractTestOfStringStoredProperty
{

    /**
     * @test
     */
    public function I_can_get_remarkable_sense_easily()
    {
        $propertyClass = $this->getPropertyClass();
        /** @noinspection PhpUndefinedMethodInspection */
        $propertyClass::getIt();
    }
}
