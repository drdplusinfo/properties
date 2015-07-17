<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Properties\Charisma;
use DrdPlus\Properties\Intelligence;
use DrdPlus\Properties\Will;

class Dignity extends AbstractAspectOfVisage
{
    const DIGNITY = 'dignity';

    /**
     * @var int
     */
    private $value;

    public function __construct(Intelligence $intelligence, Will $will, Charisma $charisma)
    {
        $this->value = $this->calculateValue($intelligence, $will, $charisma);
    }

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

}
