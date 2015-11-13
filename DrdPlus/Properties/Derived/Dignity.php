<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\PropertyCodes;
use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Derived\Parts\AbstractAspectOfVisage;
use DrdPlus\Properties\Base\Intelligence;
use DrdPlus\Properties\Base\Will;

class Dignity extends AbstractAspectOfVisage
{
    const DIGNITY = PropertyCodes::DIGNITY;

    public function __construct(Intelligence $intelligence, Will $will, Charisma $charisma)
    {
        $this->value = $this->calculateVisageValue($intelligence, $will, $charisma);
    }

    public function getCode()
    {
        return self::DIGNITY;
    }
}
