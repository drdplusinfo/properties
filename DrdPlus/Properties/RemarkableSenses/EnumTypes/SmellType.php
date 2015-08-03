<?php
namespace DrdPlus\Properties\RemarkableSenses\EnumTypes;

use DrdPlus\Properties\RemarkableSenses\Smell;

/**
 * Hearing as the remarkable sense is an enum subtype, therefore type it for Doctrine as "remarkable_sense",
 * @see \DrdPlus\Properties\RemarkableSenses\EnumTypes\RemarkableSenseType
 */
class SmellType extends Parts\AbstractRemarkableSenseType
{
    const SMELL = Smell::SMELL;
}
