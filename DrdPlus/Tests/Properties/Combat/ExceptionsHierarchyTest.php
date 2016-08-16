<?php
namespace DrdPlus\Tests\Properties\Combat;

use DrdPlus\Properties\Combat\BasePropertiesInterface;
use Granam\Tests\Exceptions\Tools\AbstractExceptionsHierarchyTest;

class ExceptionsHierarchyTest extends AbstractExceptionsHierarchyTest
{
    protected function getTestedNamespace()
    {
        return $this->getRootNamespace();
    }

    protected function getRootNamespace()
    {
        $reflection = new \ReflectionClass(BasePropertiesInterface::class);

        return $reflection->getNamespaceName();
    }

}