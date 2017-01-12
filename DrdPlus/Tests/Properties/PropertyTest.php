<?php
namespace DrdPlus\Tests\Properties;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\Native\NativeProperty;
use DrdPlus\Properties\Property;
use Granam\Tests\Tools\TestWithMockery;

abstract class PropertyTest extends TestWithMockery
{

    /**
     * @test
     * @return Property
     */
    public function I_can_get_property_easily()
    {
        /** @var NativeProperty $propertyClass */
        $propertyClass = self::getSutClass();
        $property = false;
        foreach ($this->getValuesForTest() as $value) {
            $property = $propertyClass::getIt($value);
            self::assertInstanceOf($propertyClass, $property);
            /** @var Property $property */
            self::assertSame("$value", "{$property->getValue()}");
            self::assertSame(PropertyCode::getIt($this->getExpectedPropertyCode()), $property->getCode());
        }

        return $property;
    }

    /**
     * @return string
     */
    private function getExpectedPropertyCode()
    {
        $propertyBaseName = $this->getPropertyBaseName();
        $underScoredClassName = preg_replace('~(\w)([A-Z])~', '$1_$2', $propertyBaseName);

        return strtolower($underScoredClassName);
    }

    /**
     * @return array|int[]|float[]|string[]
     */
    abstract protected function getValuesForTest();

    /**
     * @return string
     */
    protected function getPropertyBaseName()
    {
        $propertyClass = self::getSutClass();

        return preg_replace('~^[\\\]?(\w+\\\){0,5}(\w+)$~', '$2', $propertyClass);
    }

    /**
     * @test
     */
    public function Code_getter_is_properly_annotated()
    {
        $getter = new \ReflectionMethod(self::getSutClass(), 'getCode');
        self::assertRegExp(<<<'REGEXP'
~^/\*\*
(\s+)\* @return PropertyCode
\1\*/$~
REGEXP
            , $getter->getDocComment()
        );
    }

    /**
     * @test
     */
    public function I_can_use_it_as_generic_group_property()
    {
        $propertyClass = self::getSutClass();
        self::assertTrue(
            is_a($propertyClass, $this->getGenericGroupPropertyClassName(), true),
            $propertyClass . ' does not belongs into ' . $this->getGenericGroupPropertyClassName()
        );
    }

    private function getGenericGroupPropertyClassName()
    {
        $propertyNamespace = $this->getPropertyNamespace();
        $namespaceBaseName = preg_replace('~^[\\\]?(\w+\\\){0,5}(\w+)$~', '$2', $propertyNamespace);
        $groupPropertyClassBaseName = preg_replace('~s$~', '', $namespaceBaseName) . 'Property';

        return $propertyNamespace . '\\' . $groupPropertyClassBaseName;
    }

    protected function getPropertyNamespace()
    {
        $propertyClass = self::getSutClass();

        return preg_replace('~[\\\]\w+$~', '', $propertyClass);
    }
}