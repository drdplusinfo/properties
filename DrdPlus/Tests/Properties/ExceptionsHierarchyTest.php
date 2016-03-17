<?php
namespace DrdPlus\Tests\Properties;

use DrdPlus\Properties\Property;
use Granam\Tests\Exceptions\Tools\AbstractExceptionsHierarchyTest;

class ExceptionsHierarchyTest extends AbstractExceptionsHierarchyTest
{
    protected function getTestedNamespace()
    {
        return $this->getRootNamespace();
    }

    protected function getRootNamespace()
    {
        $reflection = new \ReflectionClass(Property::class);

        return $reflection->getNamespaceName();
    }

}