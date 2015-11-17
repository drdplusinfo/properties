<?php
namespace DrdPlus\Tests\Properties;

use Doctrineum\Scalar\EnumType;

abstract class AbstractTestOfStoredProperty extends AbstractTestOfProperty
{
    /**
     * @test
     */
    public function I_can_register_it_as_enum()
    {
        $basename = $this->getPropertyBaseName();
        $namespace = $this->getPropertyNamespace();
        $this->assertTrue(
            is_a($namespace . '\\EnumTypes\\' . $basename . 'Type', EnumType::class, true),
            'Not an enum type: ' . $namespace . '\\EnumTypes\\' . $basename . 'Type'
        );
    }
}
