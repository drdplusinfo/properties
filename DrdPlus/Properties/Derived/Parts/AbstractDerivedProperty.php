<?php
namespace DrdPlus\Properties\Derived\Parts;

use DrdPlus\Properties\Derived\DerivedProperty;
use Granam\Strict\Object\StrictObject;

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
}
