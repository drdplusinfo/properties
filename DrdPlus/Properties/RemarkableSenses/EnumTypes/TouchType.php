<?php
namespace DrdPlus\Properties\RemarkableSenses\EnumTypes;
use DrdPlus\Properties\RemarkableSenses\Touch;

/**
 * Hearing as the remarkable sense is an enum subtype, therefore type it for Doctrine as "remarkable_sense",
 * @see \DrdPlus\Properties\RemarkableSenses\EnumTypes\RemarkableSenseType
 */
class TouchType extends Parts\AbstractRemarkableSenseType
{
    const TOUCH = Touch::TOUCH;
}
