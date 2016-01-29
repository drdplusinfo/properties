<?php
namespace DrdPlus\Tests\Properties\RemarkableSenses\EnumTypes;

use Doctrine\DBAL\Types\Type;
use DrdPlus\Properties\RemarkableSenses\EnumTypes\RemarkableSenseType;
use DrdPlus\Properties\RemarkableSenses\Hearing;
use DrdPlus\Properties\RemarkableSenses\Sight;
use DrdPlus\Properties\RemarkableSenses\Smell;
use DrdPlus\Properties\RemarkableSenses\Taste;
use DrdPlus\Properties\RemarkableSenses\Touch;
use Granam\Tests\Tools\TestWithMockery;

class RemarkableSenseTypeTest extends TestWithMockery
{
    /**
     * @test
     */
    public function I_can_register_all_remarkable_senses_at_once()
    {
        RemarkableSenseType::registerSenses();

        $this->assertTrue(Type::hasType(RemarkableSenseType::REMARKABLE_SENSE));

        $this->assertTrue(RemarkableSenseType::hasSubTypeEnum(Hearing::class));
        $this->assertTrue(RemarkableSenseType::hasSubTypeEnum(Sight::class));
        $this->assertTrue(RemarkableSenseType::hasSubTypeEnum(Smell::class));
        $this->assertTrue(RemarkableSenseType::hasSubTypeEnum(Taste::class));
        $this->assertTrue(RemarkableSenseType::hasSubTypeEnum(Touch::class));
    }
}
