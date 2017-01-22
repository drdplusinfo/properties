<?php
namespace DrdPlus\Properties\Combat\Partials;

use Granam\Integer\Tools\ToInteger;

abstract class PositiveNumberCombatCharacteristics extends CombatCharacteristic
{
    /**
     * @param $value
     * @throws \Granam\Integer\Tools\Exceptions\WrongParameterType
     * @throws \Granam\Integer\Tools\Exceptions\ValueLostOnCast
     * @throws \Granam\Integer\Tools\Exceptions\PositiveIntegerCanNotBeNegative
     */
    public function __construct($value)
    {
        parent::__construct($value);
    }

    /**
     * @param float|int|string $value
     * @return int
     * @throws \Granam\Integer\Tools\Exceptions\WrongParameterType
     * @throws \Granam\Integer\Tools\Exceptions\ValueLostOnCast
     * @throws \Granam\Integer\Tools\Exceptions\PositiveIntegerCanNotBeNegative
     */
    protected function sanitizeValue($value)
    {
        return ToInteger::toPositiveInteger($value);
    }
}