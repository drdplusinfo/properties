<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Properties\Charisma;
use DrdPlus\Properties\Strength;
use DrdPlus\Properties\Will;

class Dangerousness extends AbstractAspectOfVisage
{
    const DANGEROUSNESS = 'dangerousness';

    private $value;

    public function __construct(Strength $strength, Will $will, Charisma $charisma)
    {
        $this->value = $this->calculateValue($strength, $will, $charisma);
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
