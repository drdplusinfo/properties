<?php
namespace DrdPlus\Properties\RemarkableSenses\EnumTypes;
use DrdPlus\Properties\RemarkableSenses\Sight;

/**
 * Hearing as the remarkable sense is an enum subtype, therefore type it for Doctrine as "remarkable_sense",
 * @see \DrdPlus\Properties\RemarkableSenses\EnumTypes\RemarkableSenseType
 */
class SightType extends Parts\AbstractRemarkableSenseType
{
    const SIGHT = Sight::SIGHT;
}
