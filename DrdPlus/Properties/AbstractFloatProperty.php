<?php
namespace DrdPlus\Properties;

use Doctrineum\Float\FloatEnum;
use Granam\Float\FloatInterface;

abstract class AbstractFloatProperty extends FloatEnum implements PropertyInterface, FloatInterface
{

    /**
     * @param int $value
     *
     * @return AbstractIntegerProperty
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

    /**
     * @return string
     */
    abstract public function getCode();

}
