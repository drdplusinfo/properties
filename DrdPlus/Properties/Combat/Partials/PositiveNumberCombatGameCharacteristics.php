<?php
namespace DrdPlus\Properties\Combat\Partials;

use Granam\Integer\Tools\ToInteger;

abstract class PositiveNumberCombatGameCharacteristics extends CombatGameCharacteristic
{
    /**
     * @param $value
     * @throws \Granam\Integer\Tools\Exceptions\WrongParameterType
     * @throws \Granam\Integer\Tools\Exceptions\ValueLostOnCast
     * @throws \Granam\Integer\Tools\Exceptions\PositiveIntegerCanNotBeNegative
     */
    public function __construct($value)
    {
        parent::__construct($this->sanitizeValue($value));
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