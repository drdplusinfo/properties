<?php
namespace DrdPlus\Tests\Properties;

use Doctrineum\Scalar\ScalarEnumType;

abstract class AbstractStoredPropertyTest extends PropertyTest
{
    /**
     * @test
     */
    public function I_can_register_it_as_enum()
    {
        $basename = $this->getPropertyBaseName();
        $namespace = $this->getPropertyNamespace();
        self::assertTrue(
            is_a($namespace . '\\EnumTypes\\' . $basename . 'Type', ScalarEnumType::class, true),
            'Not an enum type: ' . $namespace . '\\EnumTypes\\' . $basename . 'Type'
        );
    }
}