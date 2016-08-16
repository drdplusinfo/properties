<?php
namespace DrdPlus\Properties\Combat;

use Granam\Integer\IntegerInterface;
use Granam\Integer\Tools\ToInteger;
use Granam\Strict\Object\StrictObject;

abstract class CombatGameCharacteristic extends StrictObject implements IntegerInterface
{
    /**
     * @param int $value
     */
    protected function __construct($value)
    {
        $this->value = ToInteger::toInteger($value);
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
        $added->value += ToInteger::toInteger($value);

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
        $subtracted->value -= ToInteger::toInteger($value);

        return $subtracted;
    }
}