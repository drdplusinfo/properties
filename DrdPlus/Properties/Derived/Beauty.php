<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\PropertyCodes;
use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Derived\Parts\AbstractAspectOfVisage;
use DrdPlus\Properties\Base\Knack;

class Beauty extends AbstractAspectOfVisage
{
    const BEAUTY = PropertyCodes::BEAUTY;

    public function __construct(Agility $agility, Knack $knack, Charisma $charisma)
    {
        $this->value = $this->calculateVisageValue($agility, $knack, $charisma);
    }

    public function getCode()
    {
        return self::BEAUTY;
    }
}
