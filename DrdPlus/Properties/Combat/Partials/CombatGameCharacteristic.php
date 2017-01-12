<?php
namespace DrdPlus\Properties\Combat\Partials;

use DrdPlus\Properties\Partials\WithHistoryTrait;
use Granam\Integer\IntegerInterface;
use Granam\Integer\Tools\ToInteger;
use Granam\Strict\Object\StrictObject;

/** @noinspection SingletonFactoryPatternViolationInspection */
abstract class CombatGameCharacteristic extends StrictObject implements IntegerInterface
{
    use WithHistoryTrait;

    /**
     * @param int
     * @throws \Granam\Integer\Tools\Exceptions\WrongParameterType
     * @throws \Granam\Integer\Tools\Exceptions\ValueLostOnCast
     */
    protected function __construct($value)
    {
        $this->value = $this->sanitizeValue($value);
        $this->noticeChange();
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

    /**
     * @return int
     */
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
     * @param int|CombatGameCharacteristic $value
     * @return CombatGameCharacteristic
     * @throws \Granam\Integer\Tools\Exceptions\WrongParameterType
     * @throws \Granam\Integer\Tools\Exceptions\ValueLostOnCast
     */
    public function add($value)
    {
        $increased = clone $this;
        $increased->value += $this->sanitizeValue($value);
        $increased->noticeChange();

        return $increased;
    }

    /**
     * @param int|CombatGameCharacteristic $value
     * @return CombatGameCharacteristic
     * @throws \Granam\Integer\Tools\Exceptions\WrongParameterType
     * @throws \Granam\Integer\Tools\Exceptions\ValueLostOnCast
     */
    public function sub($value)
    {
        $decreased = clone $this;
        $decreased->value -= $this->sanitizeValue($value);
        $decreased->noticeChange();

        return $decreased;
    }
}