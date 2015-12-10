<?php
namespace DrdPlus\Properties\RemarkableSenses\EnumTypes;

use Doctrineum\Scalar\ScalarEnumType;
use DrdPlus\Codes\PropertyCodes;
use DrdPlus\Properties\RemarkableSenses\Hearing;
use DrdPlus\Properties\RemarkableSenses\Sight;
use DrdPlus\Properties\RemarkableSenses\Smell;
use DrdPlus\Properties\RemarkableSenses\Taste;
use DrdPlus\Properties\RemarkableSenses\Touch;

class RemarkableSenseType extends ScalarEnumType
{
    const REMARKABLE_SENSE = PropertyCodes::REMARKABLE_SENSE;

    public static function registerSenses()
    {
        self::registerSelf();

        /*
         * Remarkable senses are enum subtypes - one column for one and only one sense
         */
        if (!self::hasSubTypeEnum(Hearing::class)) {
            self::addSubTypeEnum(Hearing::class, '~' . Hearing::HEARING . '~' /* regexp */);
        }
        if (!self::hasSubTypeEnum(Sight::class)) {
            self::addSubTypeEnum(Sight::class, '~' . Sight::SIGHT . '~' /* regexp */);
        }
        if (!self::hasSubTypeEnum(Smell::class)) {
            self::addSubTypeEnum(Smell::class, '~' . Smell::SMELL . '~' /* regexp */);
        }
        if (!self::hasSubTypeEnum(Taste::class)) {
            self::addSubTypeEnum(Taste::class, '~' . Taste::TASTE . '~' /* regexp */);
        }
        if (!self::hasSubTypeEnum(Touch::class)) {
            self::addSubTypeEnum(Touch::class, '~' . Touch::TOUCH . '~' /* regexp */);
        }
    }
}
