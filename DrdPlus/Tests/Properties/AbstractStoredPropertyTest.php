<?php
namespace DrdPlus\Tests\Properties;

use Doctrineum\Scalar\ScalarEnumType;
use DrdPlus\Codes\Properties\PropertyCode;

abstract class AbstractStoredPropertyTest extends SimplePropertyTest
{
    use ItHasProperlyAnnotatedCodeGetter;

    /**
     * @return string
     */
    protected function getExpectedCodeClass(): string
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
        $typeClass = $namespace . '\\EnumTypes\\' . $basename . 'Type';
        self::assertTrue(class_exists($typeClass), "Missing enum type class {$typeClass}");
        self::assertTrue(
            is_a($namespace . '\\EnumTypes\\' . $basename . 'Type', ScalarEnumType::class, true),
            $namespace . '\\EnumTypes\\' . $basename . 'Type should be a descendant of ' . ScalarEnumType::class
        );
    }
}