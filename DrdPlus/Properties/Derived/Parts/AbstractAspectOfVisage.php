<?php
namespace DrdPlus\Properties\Derived\Parts;

use DrdPlus\Properties\AbstractIntegerProperty;
use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Tools\Numbers\SumAndRound;
use Granam\Strict\Object\StrictObject;

abstract class AbstractAspectOfVisage extends StrictObject implements DerivedPropertyInterface
{

    /**
     * @param AbstractIntegerProperty $firstProperty
     * @param AbstractIntegerProperty $secondProperty
     * @param Charisma $charisma
     *
     * @return int
     */
    protected function calculateValue(AbstractIntegerProperty $firstProperty, AbstractIntegerProperty $secondProperty, Charisma $charisma)
    {
        return SumAndRound::average($firstProperty->getValue(), $secondProperty->getValue()) + SumAndRound::half($charisma->getValue() / 2);
    }
}
