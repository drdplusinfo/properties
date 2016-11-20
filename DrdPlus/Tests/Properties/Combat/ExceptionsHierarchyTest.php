<?php
namespace DrdPlus\Tests\Properties\Combat;

use DrdPlus\Properties\Combat\FightNumber;
use DrdPlus\Properties\Property;
use Granam\Tests\Exceptions\Tools\AbstractExceptionsHierarchyTest;

class ExceptionsHierarchyTest extends AbstractExceptionsHierarchyTest
{
    protected function getTestedNamespace()
    {
        $reflection = new \ReflectionClass(FightNumber::class);

        return $reflection->getNamespaceName();
    }

    protected function getRootNamespace()
    {
        $reflection = new \ReflectionClass(Property::class);

        return $reflection->getNamespaceName();
    }

}