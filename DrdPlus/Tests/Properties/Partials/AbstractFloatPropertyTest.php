<?php
namespace DrdPlus\Tests\Properties\Partials;

use DrdPlus\Tests\Properties\AbstractStoredPropertyTest;

abstract class AbstractFloatPropertyTest extends AbstractStoredPropertyTest
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
        $reflectionClass = new \ReflectionClass(self::getSutClass());
        $classBasename = str_replace($reflectionClass->getNamespaceName() . '\\', '', $reflectionClass->getName());
        self::assertContains(<<<ANNOTATION
 * @method static {$classBasename} getIt(float | NumberInterface \$value)
ANNOTATION
            , $reflectionClass->getDocComment());
    }
}