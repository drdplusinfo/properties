<?php
namespace DrdPlus\Tests\Properties;

use DrdPlus\Properties\PropertyInterface;
use Granam\Exceptions\Tests\Tools\AbstractTestOfExceptionsHierarchy;

class ExceptionsHierarchyTest extends AbstractTestOfExceptionsHierarchy
{
    protected function getTestedNamespace()
    {
        $reflection = new \ReflectionClass(PropertyInterface::class);

        return $reflection->getNamespaceName();
    }

    protected function getRootNamespace()
    {
        return $this->getTestedNamespace();
    }

}