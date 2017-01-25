<?php
namespace DrdPlus\Tests\Properties;

use Doctrineum\Scalar\ScalarEnumType;
use DrdPlus\Codes\Properties\PropertyCode;

abstract class AbstractStoredPropertyTest extends SimplePropertyTest
{
    /**
     * @return string
     */
    protected function getExpectedCodeClass()
    {
        return PropertyCode::class;
    }

    /**
     * @test
     */
    public function I_can_register_it_as_enum()
    {
        $basename = $this->getSutBaseName();
        $namespace = $this->getPropertyNamespace();
        self::assertTrue(
            is_a($namespace . '\\EnumTypes\\' . $basename . 'Type', ScalarEnumType::class, true),
            'Not an enum type: ' . $namespace . '\\EnumTypes\\' . $basename . 'Type'
        );
    }
}