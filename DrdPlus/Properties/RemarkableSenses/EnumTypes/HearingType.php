<?php
namespace DrdPlus\Properties\RemarkableSenses\EnumTypes;

use DrdPlus\Properties\RemarkableSenses\Hearing;

/**
 * Hearing as the remarkable sense is an enum subtype, therefore type it for Doctrine as "remarkable_sense",
 * @see \DrdPlus\Properties\RemarkableSenses\EnumTypes\RemarkableSenseType
 */
class HearingType extends Parts\AbstractRemarkableSenseType
{
    const HEARING = Hearing::HEARING;
}
