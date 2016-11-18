<?php
namespace DrdPlus\Properties\Partials;

use Doctrineum\Scalar\ScalarEnum;
use DrdPlus\Properties\Property;
use Granam\String\StringInterface;

/**
 * @method static AbstractFloatProperty getEnum(string $enumValue)
 */
abstract class AbstractStringProperty extends ScalarEnum implements Property, StringInterface
{

}