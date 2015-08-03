<?php
namespace DrdPlus\Properties\RemarkableSenses\EnumTypes;
use DrdPlus\Properties\RemarkableSenses\Taste;

/**
 * Hearing as the remarkable sense is an enum subtype, therefore type it for Doctrine as "remarkable_sense",
 * @see \DrdPlus\Properties\RemarkableSenses\EnumTypes\RemarkableSenseType
 */
class TasteType extends Parts\AbstractRemarkableSenseType
{
    const TASTE = Taste::TASTE;
}
