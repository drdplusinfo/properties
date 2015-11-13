<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\PropertyCodes;
use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Derived\Parts\AbstractAspectOfVisage;
use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Base\Will;

class Dangerousness extends AbstractAspectOfVisage
{
    const DANGEROUSNESS = PropertyCodes::DANGEROUSNESS;

    public function __construct(Strength $strength, Will $will, Charisma $charisma)
    {
        $this->value = $this->calculateVisageValue($strength, $will, $charisma);
    }

    public function getCode()
    {
        return self::DANGEROUSNESS;
    }
}
