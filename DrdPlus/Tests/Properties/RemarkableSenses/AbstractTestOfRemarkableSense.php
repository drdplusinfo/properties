<?php
namespace DrdPlus\Tests\Properties\RemarkableSenses;

use DrdPlus\Properties\RemarkableSenses\EnumTypes\RemarkableSenseType;
use DrdPlus\Properties\RemarkableSenses\RemarkableSenseProperty;
use DrdPlus\Tests\Properties\AbstractStoredPropertyTest;

abstract class AbstractTestOfRemarkableSense extends AbstractStoredPropertyTest
{

    /**
     * @test
     * @return RemarkableSenseProperty
     */
    public function I_can_get_property_easily()
    {
        $propertyClass = self::getSutClass();
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
        self::assertTrue(RemarkableSenseType::hasSubTypeEnum(self::getSutClass()));
    }
}
