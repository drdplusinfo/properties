<?php
namespace DrdPlus\Properties\Base;

use DrdPlus\Properties\PropertyInterface;
use Granam\Integer\IntegerInterface;

/**
 * @method static BaseProperty getIt(int $value)
 */
interface BaseProperty extends PropertyInterface, IntegerInterface
{

}
