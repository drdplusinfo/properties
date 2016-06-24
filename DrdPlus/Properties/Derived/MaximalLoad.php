<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Derived\Parts\AbstractDerivedProperty;
use DrdPlus\Properties\Derived\Parts\AthleticsInterface;

class MaximalLoad extends AbstractDerivedProperty
{
    const MAXIMAL_LOAD = 'maximal_load';

    public function __construct(Strength $strength, AthleticsInterface $athletics)
    {
        $this->value = $strength->getValue() + 21 + $athletics->getAthleticsBonus()->getValue();
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return self::MAXIMAL_LOAD;
    }

}