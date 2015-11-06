<?php
namespace DrdPlus\Properties;

use Doctrineum\Integer\IntegerEnum;

abstract class AbstractIntegerProperty extends IntegerEnum implements PropertyInterface
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
