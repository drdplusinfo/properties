<?php
namespace DrdPlus\Properties\Combat\Partials;

use Granam\Integer\IntegerInterface;
use Granam\Integer\Tools\ToInteger;
use Granam\Strict\Object\StrictObject;

abstract class CombatGameCharacteristic extends StrictObject implements IntegerInterface
{
    /**
     * @param int
     * @throws \Granam\Integer\Tools\Exceptions\WrongParameterType
     * @throws \Granam\Integer\Tools\Exceptions\ValueLostOnCast
     */
    protected function __construct($value)
    {
        $this->value = $this->sanitizeValue($value);
    }

    /**
     * @param int|string|float|IntegerInterface $value
     * @return int
     * @throws \Granam\Integer\Tools\Exceptions\WrongParameterType
     * @throws \Granam\Integer\Tools\Exceptions\ValueLostOnCast
     */
    protected function sanitizeValue($value)
    {
        return ToInteger::toInteger($value);
    }

    /**
     * @var int
     */
    private $value;

    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->getValue();
    }

    /**
     * @param int|static|CombatGameCharacteristic $value
     * @return static
     * @throws \Granam\Integer\Tools\Exceptions\WrongParameterType
     * @throws \Granam\Integer\Tools\Exceptions\ValueLostOnCast
     */
    public function add($value)
    {
        $added = clone $this;
        $expectedNewValue = $added->getValue() + $this->sanitizeValue($value);
        $added->value = $this->sanitizeValue($expectedNewValue);

        return $added;
    }

    /**
     * @param int|static|CombatGameCharacteristic $value
     * @return static
     * @throws \Granam\Integer\Tools\Exceptions\WrongParameterType
     * @throws \Granam\Integer\Tools\Exceptions\ValueLostOnCast
     */
    public function sub($value)
    {
        $subtracted = clone $this;
        $expectedNewValue = $subtracted->getValue() - $this->sanitizeValue($value);
        $subtracted->value = $this->sanitizeValue($expectedNewValue);

        return $subtracted;
    }
}