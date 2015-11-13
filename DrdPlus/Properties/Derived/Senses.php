<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\PropertyCodes;
use DrdPlus\Properties\Base\Knack;
use DrdPlus\Properties\Derived\Parts\AbstractDerivedProperty;
use Granam\Integer\IntegerInterface;

class Senses extends AbstractDerivedProperty
{
    const SENSES = PropertyCodes::SENSES;

    public function __construct(Knack $knack, IntegerInterface $raceGenderSenses)
    {
        $this->value = $knack->getValue() + $raceGenderSenses->getValue();
    }

    public function getCode()
    {
        return self::SENSES;
    }
}
