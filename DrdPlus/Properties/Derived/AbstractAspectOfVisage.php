<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Properties\Parts\BaseProperty;
use DrdPlus\Properties\Charisma;
use DrdPlus\Tools\Numbers\SumAndRound;
use Granam\Strict\Object\StrictObject;

abstract class AbstractAspectOfVisage extends StrictObject implements DerivedPropertyInterface
{

    /**
     * @param BaseProperty $firstProperty
     * @param BaseProperty $secondProperty
     * @param Charisma $charisma
     *
     * @return int
     */
    protected function calculateValue(BaseProperty $firstProperty, BaseProperty $secondProperty, Charisma $charisma)
    {
        return SumAndRound::average($firstProperty->getValue(), $secondProperty->getValue()) + SumAndRound::half($charisma->getValue() / 2);
    }
}
