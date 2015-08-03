<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Derived\Parts\AbstractAspectOfVisage;
use DrdPlus\Properties\Base\Knack;

class Beauty extends AbstractAspectOfVisage
{
    const BEAUTY = 'beauty';

    /**
     * @var int
     */
    private $value;

    public function __construct(Agility $agility, Knack $knack, Charisma $charisma)
    {
        $this->value = $this->calculateValue($agility, $knack, $charisma);
    }

    public function getCode()
    {
        return self::BEAUTY;
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
