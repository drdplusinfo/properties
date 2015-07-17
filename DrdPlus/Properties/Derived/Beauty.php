<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Properties\Agility;
use DrdPlus\Properties\Charisma;
use DrdPlus\Properties\Knack;

class Beauty extends AbstractAspectOfVisage
{

    /**
     * @var int
     */
    private $value;

    public function __construct(Agility $agility, Knack $knack, Charisma $charisma)
    {
        $this->value = $this->calculateValue($agility, $knack, $charisma);
    }

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
