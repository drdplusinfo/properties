<?php
namespace DrdPlus\Properties\RemarkableSenses\EnumTypes;

use DrdPlus\Properties\EnumTypes\AbstractStringType;

class RemarkableSenseType extends AbstractStringType
{
    const REMARKABLE_SENSE = 'remarkable_sense';

    public static function registerSenses()
    {
        self::registerSelf();

        /*
         * Remarkable senses are enum subtypes - one column for one and only one sense
         */
        self::addSubTypeEnum(HearingType::class, '~' . HearingType::class . '~' /* regexp */);
        self::addSubTypeEnum(SightType::class, '~' . SightType::class . '~' /* regexp */);
        self::addSubTypeEnum(SmellType::class, '~' . SmellType::class . '~' /* regexp */);
        self::addSubTypeEnum(TasteType::class, '~' . TasteType::class . '~' /* regexp */);
        self::addSubTypeEnum(TouchType::class, '~' . TouchType::class . '~' /* regexp */);
    }
}
