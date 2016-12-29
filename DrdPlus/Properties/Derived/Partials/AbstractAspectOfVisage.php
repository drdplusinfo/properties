<?php
namespace DrdPlus\Properties\Derived\Partials;

use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Calculations\SumAndRound;
use Granam\Integer\IntegerInterface;

/** @noinspection SingletonFactoryPatternViolationInspection */
abstract class AbstractAspectOfVisage extends AbstractDerivedProperty
{
    /**
     * @param IntegerInterface $firstProperty
     * @param IntegerInterface $secondProperty
     * @param Charisma $charisma
     */
    protected function __construct(IntegerInterface $firstProperty, IntegerInterface $secondProperty, Charisma $charisma)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        parent::__construct(
            SumAndRound::average($firstProperty->getValue(), $secondProperty->getValue())
            + SumAndRound::half($charisma->getValue())
        );
    }
}