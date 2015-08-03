<?php
namespace DrdPlus\Properties\Body;

use DrdPlus\Properties\AbstractFloatProperty;

class WeightInKg extends AbstractFloatProperty
{
    const WEIGHT_IN_KG = 'weight_in_kg';

    /**
     * @param int $value
     * @return self
     */
    public static function getIt($value)
    {
        return static::getEnum($value);
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return self::WEIGHT_IN_KG;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->getEnumValue();
    }
}
