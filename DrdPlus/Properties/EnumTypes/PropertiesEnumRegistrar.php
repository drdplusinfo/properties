<?php
namespace DrdPlus\Properties\EnumTypes;

use DrdPlus\Properties\Base\EnumTypes\AgilityType;
use DrdPlus\Properties\Base\EnumTypes\CharismaType;
use DrdPlus\Properties\Base\EnumTypes\IntelligenceType;
use DrdPlus\Properties\Base\EnumTypes\KnackType;
use DrdPlus\Properties\Base\EnumTypes\StrengthType;
use DrdPlus\Properties\Base\EnumTypes\WillType;
use DrdPlus\Properties\Body\EnumTypes\HeightInCmType;
use DrdPlus\Properties\Body\EnumTypes\SizeType;
use DrdPlus\Properties\Body\EnumTypes\WeightInKgType;
use DrdPlus\Properties\Native\EnumTypes\InfravisionType;
use DrdPlus\Properties\Native\EnumTypes\NativeRegenerationType;
use DrdPlus\Properties\RemarkableSenses\EnumTypes\RemarkableSenseType;
use Granam\Strict\Object\StrictObject;

class PropertiesEnumRegistrar extends StrictObject
{
    public static function registerAll()
    {
        static::registerBase();
        static::registerBody();
        static::registerRemarkableSenses();
        static::registerNative();
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
        HeightInCmType::registerSelf();
        SizeType::registerSelf();
        WeightInKgType::registerSelf();
    }

    protected static function registerRemarkableSenses()
    {
        RemarkableSenseType::registerSenses();
    }

    protected static function registerNative()
    {
        InfravisionType::registerSelf();
        NativeRegenerationType::registerSelf();
    }
}
