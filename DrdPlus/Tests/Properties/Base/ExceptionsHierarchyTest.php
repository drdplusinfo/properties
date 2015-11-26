<?php
namespace DrdPlus\Tests\Properties\Base;

use DrdPlus\Properties\Base\BaseProperty;
use DrdPlus\Properties\PropertyInterface;
use Granam\Exceptions\Tests\Tools\AbstractTestOfExceptionsHierarchy;

class ExceptionsHierarchyTest extends AbstractTestOfExceptionsHierarchy
{
    protected function getTestedNamespace()
    {
        $reflection = new \ReflectionClass(BaseProperty::class);

        return $reflection->getNamespaceName();
    }

    protected function getRootNamespace()
    {
        $reflection = new \ReflectionClass(PropertyInterface::class);

        return $reflection->getNamespaceName();
    }

}