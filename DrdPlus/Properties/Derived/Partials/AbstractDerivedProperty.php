<?php
namespace DrdPlus\Properties\Derived\Partials;

use DrdPlus\Properties\Derived\DerivedProperty;
use Granam\Integer\Tools\ToInteger;
use Granam\Strict\Object\StrictObject;

/**
 * Unlike \DrdPlus\Properties\AbstractDerivedProperty this is not an enum because is not intended to be persisted (is calculated / derived always)
 */
abstract class AbstractDerivedProperty extends StrictObject implements DerivedProperty
{
    /**
     * @var int
     */
    protected $value;

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->getValue();
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param int|static $value
     * @return AbstractDerivedProperty
     * @throws \Granam\Integer\Tools\Exceptions\WrongParameterType
     * @throws \Granam\Integer\Tools\Exceptions\ValueLostOnCast
     */
    public function add($value)
    {
        $increased = clone $this;
        $increased->value += ToInteger::toInteger($value);

        return $increased;
    }

    /**
     * @param int|static $value
     * @return AbstractDerivedProperty
     * @throws \Granam\Integer\Tools\Exceptions\WrongParameterType
     * @throws \Granam\Integer\Tools\Exceptions\ValueLostOnCast
     */
    public function sub($value)
    {
        $decreased = clone $this;
        $decreased->value -= ToInteger::toInteger($value);

        return $decreased;
    }
}