<?php
namespace DrdPlus\Properties;

use Doctrineum\Float\FloatEnum;
use Granam\Float\FloatInterface;

abstract class AbstractFloatProperty extends FloatEnum implements PropertyInterface, FloatInterface
{

    /**
     * @param int $value
     *
     * @return static
     */
    public static function getIt($value)
    {
        return static::getEnum($value);
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->getEnumValue();
    }
}
