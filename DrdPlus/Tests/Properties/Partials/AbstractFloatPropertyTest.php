<?php
namespace DrdPlus\Tests\Properties\Partials;

use DrdPlus\Tests\Properties\AbstractTestOfStoredProperty;

abstract class AbstractFloatPropertyTest extends AbstractTestOfStoredProperty
{

    protected function getValuesForTest()
    {
        return [0.01, 123.456];
    }

    /**
     * @test
     */
    public function Has_modifying_methods_return_value_annotated()
    {
        $reflectionClass = new \ReflectionClass($this->getSutClass());
        $classBasename = str_replace($reflectionClass->getNamespaceName() . '\\', '', $reflectionClass->getName());
        self::assertContains(<<<COMMENT
 * @method static {$classBasename} getIt(float|NumberInterface \$value)
COMMENT
            , $reflectionClass->getDocComment());
    }
}