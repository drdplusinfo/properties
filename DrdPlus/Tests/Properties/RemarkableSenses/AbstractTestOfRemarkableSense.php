<?php
namespace DrdPlus\Tests\Properties\RemarkableSenses;

use DrdPlus\Properties\RemarkableSenses\EnumTypes\RemarkableSenseType;
use DrdPlus\Properties\RemarkableSenses\RemarkableSenseProperty;
use DrdPlus\Tests\Properties\AbstractTestOfStoredProperty;

abstract class AbstractTestOfRemarkableSense extends AbstractTestOfStoredProperty
{

    /**
     * @test
     * @return RemarkableSenseProperty
     */
    public function I_can_get_property_easily()
    {
        $propertyClass = $this->getPropertyClass();
        /** @var RemarkableSenseProperty $propertyClass */
        $property = $propertyClass::getIt();
        self::assertInstanceOf($propertyClass, $property);
        self::assertSame(strtolower($this->getPropertyBaseName()), $property->getValue());

        return $property;
    }

    protected function getValuesForTest()
    {
        throw new \LogicException('Should not be called');
    }

    /**
     * @test
     */
    public function I_can_register_it_as_enum()
    {
        RemarkableSenseType::registerSenses();
        self::assertTrue(RemarkableSenseType::hasSubTypeEnum($this->getPropertyClass()));
    }
}
