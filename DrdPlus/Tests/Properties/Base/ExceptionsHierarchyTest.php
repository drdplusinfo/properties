<?php
namespace DrdPlus\Tests\Properties\Base;

use DrdPlus\Properties\Base\BaseProperty;
use DrdPlus\Properties\Property;
use Granam\Tests\Exceptions\Tools\AbstractExceptionsHierarchyTest;

class ExceptionsHierarchyTest extends AbstractExceptionsHierarchyTest
{
    protected function getTestedNamespace()
    {
        $reflection = new \ReflectionClass(BaseProperty::class);

        return $reflection->getNamespaceName();
    }

    protected function getRootNamespace()
    {
        $reflection = new \ReflectionClass(Property::class);

        return $reflection->getNamespaceName();
    }

}