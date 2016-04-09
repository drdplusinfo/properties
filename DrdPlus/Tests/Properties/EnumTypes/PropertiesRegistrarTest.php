<?php
namespace DrdPlus\Tests\Properties\EnumTypes;

use Doctrine\DBAL\Types\Type;
use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Base\Intelligence;
use DrdPlus\Properties\Base\Knack;
use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Base\Will;
use DrdPlus\Properties\Body\HeightInCm;
use DrdPlus\Properties\Body\Size;
use DrdPlus\Properties\Body\WeightInKg;
use DrdPlus\Properties\EnumTypes\PropertiesRegistrar;
use DrdPlus\Properties\Native\Infravision;
use DrdPlus\Properties\Native\NativeRegeneration;
use DrdPlus\Properties\RemarkableSenses\EnumTypes\RemarkableSenseType;
use DrdPlus\Properties\RemarkableSenses\Hearing;
use DrdPlus\Properties\RemarkableSenses\Sight;
use DrdPlus\Properties\RemarkableSenses\Smell;
use DrdPlus\Properties\RemarkableSenses\Taste;
use DrdPlus\Properties\RemarkableSenses\Touch;
use Granam\Tests\Tools\TestWithMockery;

class PropertiesRegistrarTest extends TestWithMockery
{
    /**
     * @test
     */
    public function I_can_register_all_properties_as_doctrine_types()
    {
        PropertiesRegistrar::registerAll();

        self::assertTrue(Type::hasType(Strength::STRENGTH));
        self::assertTrue(Type::hasType(Agility::AGILITY));
        self::assertTrue(Type::hasType(Knack::KNACK));
        self::assertTrue(Type::hasType(Will::WILL));
        self::assertTrue(Type::hasType(Intelligence::INTELLIGENCE));
        self::assertTrue(Type::hasType(Charisma::CHARISMA));

        self::assertTrue(Type::hasType(HeightInCm::HEIGHT_IN_CM));
        self::assertTrue(Type::hasType(Size::SIZE));
        self::assertTrue(Type::hasType(WeightInKg::WEIGHT_IN_KG));

        self::assertTrue(Type::hasType(RemarkableSenseType::getTypeName()));
        self::assertTrue(RemarkableSenseType::hasSubTypeEnum(Hearing::class));
        self::assertTrue(RemarkableSenseType::hasSubTypeEnum(Sight::class));
        self::assertTrue(RemarkableSenseType::hasSubTypeEnum(Smell::class));
        self::assertTrue(RemarkableSenseType::hasSubTypeEnum(Taste::class));
        self::assertTrue(RemarkableSenseType::hasSubTypeEnum(Touch::class));

        self::assertTrue(Type::hasType(Infravision::INFRAVISION));
        self::assertTrue(Type::hasType(NativeRegeneration::NATIVE_REGENERATION));
    }
}
