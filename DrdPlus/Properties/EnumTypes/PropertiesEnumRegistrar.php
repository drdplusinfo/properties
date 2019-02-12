<?php
declare(strict_types=1);

namespace DrdPlus\Properties\EnumTypes;

use DrdPlus\BaseProperties\EnumTypes\AgilityType;
use DrdPlus\BaseProperties\EnumTypes\CharismaType;
use DrdPlus\BaseProperties\EnumTypes\IntelligenceType;
use DrdPlus\BaseProperties\EnumTypes\KnackType;
use DrdPlus\BaseProperties\EnumTypes\StrengthType;
use DrdPlus\BaseProperties\EnumTypes\WillType;
use DrdPlus\Properties\Body\EnumTypes\AgeType;
use DrdPlus\Properties\Body\EnumTypes\HeightInCmType;
use DrdPlus\Properties\Body\EnumTypes\SizeType;
use DrdPlus\Properties\Body\EnumTypes\BodyWeightInKgType;
use DrdPlus\Properties\Native\EnumTypes\InfravisionType;
use DrdPlus\Properties\Native\EnumTypes\NativeRegenerationType;
use DrdPlus\Properties\RemarkableSenses\EnumTypes\RemarkableSenseType;
use Granam\Strict\Object\StrictObject;

class PropertiesEnumRegistrar extends StrictObject
{
    public static function registerAll()
    {
        static::registerBaseProperties();
        static::registerBodyProperties();
        static::registerRemarkableSenses();
        static::registerNativeProperties();
    }

    public static function registerBaseProperties()
    {
        StrengthType::registerSelf();
        AgilityType::registerSelf();
        KnackType::registerSelf();
        WillType::registerSelf();
        IntelligenceType::registerSelf();
        CharismaType::registerSelf();
    }

    public static function registerBodyProperties()
    {
        HeightInCmType::registerSelf();
        SizeType::registerSelf();
        BodyWeightInKgType::registerSelf();
        AgeType::registerSelf();
    }

    public static function registerRemarkableSenses()
    {
        RemarkableSenseType::registerSenses();
    }

    public static function registerNativeProperties()
    {
        InfravisionType::registerSelf();
        NativeRegenerationType::registerSelf();
    }
}