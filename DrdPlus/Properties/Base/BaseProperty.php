<?php
namespace DrdPlus\Properties\Base;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Properties\Property;
use Granam\Integer\IntegerInterface;

/**
 * @method static BaseProperty getIt(int | IntegerInterface $value)
 * @method PropertyCode getCode()
 */
interface BaseProperty extends Property, IntegerInterface
{

}