<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Derived\Parts\AbstractAspectOfVisage;
use DrdPlus\Properties\Base\Intelligence;
use DrdPlus\Properties\Base\Will;

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

    public function getCode()
    {
        return self::DIGNITY;
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
