<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\PropertyCodes;
use DrdPlus\Properties\Base\Knack;
use DrdPlus\Properties\Derived\Parts\AbstractDerivedProperty;
use Granam\Integer\Tools\ToInteger;

class Senses extends AbstractDerivedProperty
{
    const SENSES = PropertyCodes::SENSES;

    public function __construct(Knack $knack, $raceGenderSenses)
    {
        $this->value = $knack->getValue() + ToInteger::toInteger($raceGenderSenses);
    }

    public function getCode()
    {
        return self::SENSES;
    }
}
