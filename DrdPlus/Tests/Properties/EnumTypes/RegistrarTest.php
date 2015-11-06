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
use DrdPlus\Properties\EnumTypes\Registrar;
use DrdPlus\Properties\Native\Infravision;
use DrdPlus\Properties\Native\NativeRegeneration;
use DrdPlus\Properties\RemarkableSenses\EnumTypes\RemarkableSenseType;
use DrdPlus\Properties\RemarkableSenses\Hearing;
use DrdPlus\Properties\RemarkableSenses\Sight;
use DrdPlus\Properties\RemarkableSenses\Smell;
use DrdPlus\Properties\RemarkableSenses\Taste;
use DrdPlus\Properties\RemarkableSenses\Touch;
use DrdPlus\Tests\Properties\TestWithMockery;

class RegistrarTest extends TestWithMockery
{
    /**
     * @test
     */
    public function I_can_register_all_properties_as_doctrine_types()
    {
        Registrar::registerAll();

        $this->assertTrue(Type::hasType(Strength::STRENGTH));
        $this->assertTrue(Type::hasType(Agility::AGILITY));
        $this->assertTrue(Type::hasType(Knack::KNACK));
        $this->assertTrue(Type::hasType(Will::WILL));
        $this->assertTrue(Type::hasType(Intelligence::INTELLIGENCE));
        $this->assertTrue(Type::hasType(Charisma::CHARISMA));

        $this->assertTrue(Type::hasType(HeightInCm::HEIGHT_IN_CM));
        $this->assertTrue(Type::hasType(Size::SIZE));
        $this->assertTrue(Type::hasType(WeightInKg::WEIGHT_IN_KG));

        $this->assertTrue(Type::hasType(RemarkableSenseType::getTypeName()));
        $this->assertTrue(RemarkableSenseType::hasSubTypeEnum(Hearing::class));
        $this->assertTrue(RemarkableSenseType::hasSubTypeEnum(Sight::class));
        $this->assertTrue(RemarkableSenseType::hasSubTypeEnum(Smell::class));
        $this->assertTrue(RemarkableSenseType::hasSubTypeEnum(Taste::class));
        $this->assertTrue(RemarkableSenseType::hasSubTypeEnum(Touch::class));

        $this->assertTrue(Type::hasType(Infravision::INFRAVISION));
        $this->assertTrue(Type::hasType(NativeRegeneration::NATIVE_REGENERATION));
    }
}
