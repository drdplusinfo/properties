<?php
namespace DrdPlus\Tests\Properties\EnumTypes;

use Doctrine\DBAL\Types\Type;
use Doctrineum\Scalar\ScalarEnumType;
use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Base\Intelligence;
use DrdPlus\Properties\Base\Knack;
use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Base\Will;
use DrdPlus\Properties\Body\Age;
use DrdPlus\Properties\Body\HeightInCm;
use DrdPlus\Properties\Body\Size;
use DrdPlus\Properties\Body\WeightInKg;
use DrdPlus\Properties\EnumTypes\PropertiesEnumRegistrar;
use DrdPlus\Properties\Native\Infravision;
use DrdPlus\Properties\Native\NativeRegeneration;
use DrdPlus\Properties\RemarkableSenses\EnumTypes\RemarkableSenseType;
use DrdPlus\Properties\RemarkableSenses\Hearing;
use DrdPlus\Properties\RemarkableSenses\Sight;
use DrdPlus\Properties\RemarkableSenses\Smell;
use DrdPlus\Properties\RemarkableSenses\Taste;
use DrdPlus\Properties\RemarkableSenses\Touch;
use Granam\Tests\Tools\TestWithMockery;

class PropertiesEnumRegistrarTest extends TestWithMockery
{

    protected function setUp()
    {
        $typeReflection = new \ReflectionClass(Type::class);
        $typesMap = $typeReflection->getProperty('_typesMap');
        $typesMap->setAccessible(true);
        $typesMap->setValue([]);

        $enumTypeReflection = new \ReflectionClass(ScalarEnumType::class);
        $subTypeMap = $enumTypeReflection->getProperty('enumSubTypesMap');
        $subTypeMap->setAccessible(true);
        $subTypeMap->setValue([]);
    }

    /**
     * @test
     */
    public function I_can_register_all_properties_as_doctrine_types()
    {
        PropertiesEnumRegistrar::registerAll();

        self::assertTrue(Type::hasType(Strength::STRENGTH));
        self::assertTrue(Type::hasType(Agility::AGILITY));
        self::assertTrue(Type::hasType(Knack::KNACK));
        self::assertTrue(Type::hasType(Will::WILL));
        self::assertTrue(Type::hasType(Intelligence::INTELLIGENCE));
        self::assertTrue(Type::hasType(Charisma::CHARISMA));

        self::assertTrue(Type::hasType(HeightInCm::HEIGHT_IN_CM));
        self::assertTrue(Type::hasType(Size::SIZE));
        self::assertTrue(Type::hasType(WeightInKg::WEIGHT_IN_KG));
        self::assertTrue(Type::hasType(Age::AGE));

        self::assertTrue(Type::hasType(RemarkableSenseType::REMARKABLE_SENSE));
        self::assertTrue(RemarkableSenseType::hasSubTypeEnum(Hearing::class));
        self::assertTrue(RemarkableSenseType::hasSubTypeEnum(Sight::class));
        self::assertTrue(RemarkableSenseType::hasSubTypeEnum(Smell::class));
        self::assertTrue(RemarkableSenseType::hasSubTypeEnum(Taste::class));
        self::assertTrue(RemarkableSenseType::hasSubTypeEnum(Touch::class));

        self::assertTrue(Type::hasType(Infravision::INFRAVISION));
        self::assertTrue(Type::hasType(NativeRegeneration::NATIVE_REGENERATION));
    }

    /**
     * @test
     */
    public function I_can_register_base_properties_as_doctrine_types()
    {
        PropertiesEnumRegistrar::registerBaseProperties();

        self::assertTrue(Type::hasType(Strength::STRENGTH));
        self::assertTrue(Type::hasType(Agility::AGILITY));
        self::assertTrue(Type::hasType(Knack::KNACK));
        self::assertTrue(Type::hasType(Will::WILL));
        self::assertTrue(Type::hasType(Intelligence::INTELLIGENCE));
        self::assertTrue(Type::hasType(Charisma::CHARISMA));

        self::assertFalse(Type::hasType(HeightInCm::HEIGHT_IN_CM));
        self::assertFalse(Type::hasType(Size::SIZE));
        self::assertFalse(Type::hasType(WeightInKg::WEIGHT_IN_KG));
        self::assertFalse(Type::hasType(Age::AGE));

        self::assertFalse(Type::hasType(RemarkableSenseType::REMARKABLE_SENSE));
        self::assertFalse(RemarkableSenseType::hasSubTypeEnum(Hearing::class));
        self::assertFalse(RemarkableSenseType::hasSubTypeEnum(Sight::class));
        self::assertFalse(RemarkableSenseType::hasSubTypeEnum(Smell::class));
        self::assertFalse(RemarkableSenseType::hasSubTypeEnum(Taste::class));
        self::assertFalse(RemarkableSenseType::hasSubTypeEnum(Touch::class));

        self::assertFalse(Type::hasType(Infravision::INFRAVISION));
        self::assertFalse(Type::hasType(NativeRegeneration::NATIVE_REGENERATION));
    }

    /**
     * @test
     */
    public function I_can_register_body_properties_as_doctrine_types()
    {
        PropertiesEnumRegistrar::registerBodyProperties();

        self::assertFalse(Type::hasType(Strength::STRENGTH));
        self::assertFalse(Type::hasType(Agility::AGILITY));
        self::assertFalse(Type::hasType(Knack::KNACK));
        self::assertFalse(Type::hasType(Will::WILL));
        self::assertFalse(Type::hasType(Intelligence::INTELLIGENCE));
        self::assertFalse(Type::hasType(Charisma::CHARISMA));

        self::assertTrue(Type::hasType(HeightInCm::HEIGHT_IN_CM));
        self::assertTrue(Type::hasType(Size::SIZE));
        self::assertTrue(Type::hasType(WeightInKg::WEIGHT_IN_KG));
        self::assertTrue(Type::hasType(Age::AGE));

        self::assertFalse(Type::hasType(RemarkableSenseType::REMARKABLE_SENSE));
        self::assertFalse(RemarkableSenseType::hasSubTypeEnum(Hearing::class));
        self::assertFalse(RemarkableSenseType::hasSubTypeEnum(Sight::class));
        self::assertFalse(RemarkableSenseType::hasSubTypeEnum(Smell::class));
        self::assertFalse(RemarkableSenseType::hasSubTypeEnum(Taste::class));
        self::assertFalse(RemarkableSenseType::hasSubTypeEnum(Touch::class));

        self::assertFalse(Type::hasType(Infravision::INFRAVISION));
        self::assertFalse(Type::hasType(NativeRegeneration::NATIVE_REGENERATION));
    }

    /**
     * @test
     */
    public function I_can_register_remarkable_senses_as_doctrine_type_and_enum_sub_types()
    {
        PropertiesEnumRegistrar::registerRemarkableSenses();

        self::assertFalse(Type::hasType(Strength::STRENGTH));
        self::assertFalse(Type::hasType(Agility::AGILITY));
        self::assertFalse(Type::hasType(Knack::KNACK));
        self::assertFalse(Type::hasType(Will::WILL));
        self::assertFalse(Type::hasType(Intelligence::INTELLIGENCE));
        self::assertFalse(Type::hasType(Charisma::CHARISMA));

        self::assertFalse(Type::hasType(HeightInCm::HEIGHT_IN_CM));
        self::assertFalse(Type::hasType(Size::SIZE));
        self::assertFalse(Type::hasType(WeightInKg::WEIGHT_IN_KG));
        self::assertFalse(Type::hasType(Age::AGE));

        self::assertTrue(Type::hasType(RemarkableSenseType::REMARKABLE_SENSE));
        self::assertTrue(RemarkableSenseType::hasSubTypeEnum(Hearing::class));
        self::assertTrue(RemarkableSenseType::hasSubTypeEnum(Sight::class));
        self::assertTrue(RemarkableSenseType::hasSubTypeEnum(Smell::class));
        self::assertTrue(RemarkableSenseType::hasSubTypeEnum(Taste::class));
        self::assertTrue(RemarkableSenseType::hasSubTypeEnum(Touch::class));

        self::assertFalse(Type::hasType(Infravision::INFRAVISION));
        self::assertFalse(Type::hasType(NativeRegeneration::NATIVE_REGENERATION));
    }

    /**
     * @test
     */
    public function I_can_register_native_properties_as_doctrine_type()
    {
        PropertiesEnumRegistrar::registerNativeProperties();

        self::assertFalse(Type::hasType(Strength::STRENGTH));
        self::assertFalse(Type::hasType(Agility::AGILITY));
        self::assertFalse(Type::hasType(Knack::KNACK));
        self::assertFalse(Type::hasType(Will::WILL));
        self::assertFalse(Type::hasType(Intelligence::INTELLIGENCE));
        self::assertFalse(Type::hasType(Charisma::CHARISMA));

        self::assertFalse(Type::hasType(HeightInCm::HEIGHT_IN_CM));
        self::assertFalse(Type::hasType(Size::SIZE));
        self::assertFalse(Type::hasType(WeightInKg::WEIGHT_IN_KG));
        self::assertFalse(Type::hasType(Age::AGE));

        self::assertFalse(Type::hasType(RemarkableSenseType::REMARKABLE_SENSE));
        self::assertFalse(RemarkableSenseType::hasSubTypeEnum(Hearing::class));
        self::assertFalse(RemarkableSenseType::hasSubTypeEnum(Sight::class));
        self::assertFalse(RemarkableSenseType::hasSubTypeEnum(Smell::class));
        self::assertFalse(RemarkableSenseType::hasSubTypeEnum(Taste::class));
        self::assertFalse(RemarkableSenseType::hasSubTypeEnum(Touch::class));

        self::assertTrue(Type::hasType(Infravision::INFRAVISION));
        self::assertTrue(Type::hasType(NativeRegeneration::NATIVE_REGENERATION));
    }
}