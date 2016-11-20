<?php
namespace DrdPlus\Properties\Derived\Partials;

use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Tools\Calculations\SumAndRound;
use Granam\Integer\IntegerInterface;

abstract class AbstractAspectOfVisage extends AbstractDerivedProperty
{
    protected function __construct(IntegerInterface $firstProperty, IntegerInterface $secondProperty, Charisma $charisma)
    {
        $this->value = SumAndRound::average($firstProperty->getValue(), $secondProperty->getValue())
            + SumAndRound::half($charisma->getValue());
    }
}