<?php
namespace DrdPlus\Properties\EnumTypes;

use DrdPlus\Properties\Base\EnumTypes\AgilityType;
use DrdPlus\Properties\Base\EnumTypes\CharismaType;
use DrdPlus\Properties\Base\EnumTypes\IntelligenceType;
use DrdPlus\Properties\Base\EnumTypes\KnackType;
use DrdPlus\Properties\Base\EnumTypes\StrengthType;
use DrdPlus\Properties\Base\EnumTypes\WillType;
use DrdPlus\Properties\Body\EnumTypes\WeightInKgType;
use DrdPlus\Properties\RemarkableSenses\EnumTypes\RemarkableSenseType;
use Granam\Strict\Object\StrictObject;

class Registrar extends StrictObject
{
    public static function registerAll()
    {
        static::registerBase();
        static::registerBody();
        static::registerRemarkableSenses();
    }

    protected static function registerBase()
    {
        StrengthType::registerSelf();
        AgilityType::registerSelf();
        KnackType::registerSelf();
        WillType::registerSelf();
        IntelligenceType::registerSelf();
        CharismaType::registerSelf();
    }

    protected static function registerBody()
    {
        WeightInKgType::registerSelf();
    }

    protected static function registerRemarkableSenses()
    {
        // Senses are subtypes of enum
        RemarkableSenseType::registerSenses();
    }
}
