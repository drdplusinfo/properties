<?php
namespace DrdPlus\Properties\Base;

use DrdPlus\Properties\Property;
use Granam\Integer\IntegerInterface;

/**
 * @method static BaseProperty getIt(int|IntegerInterface $value)
 */
interface BaseProperty extends Property, IntegerInterface
{

}