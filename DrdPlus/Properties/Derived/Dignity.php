<?php
declare(strict_types=1);

namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\BaseProperties\Charisma;
use DrdPlus\Properties\Derived\Partials\AspectOfVisage;
use DrdPlus\BaseProperties\Intelligence;
use DrdPlus\BaseProperties\Will;

class Dignity extends AspectOfVisage
{
    /**
     * @param Intelligence $intelligence
     * @param Will $will
     * @param Charisma $charisma
     * @return Dignity
     */
    public static function getIt(Intelligence $intelligence, Will $will, Charisma $charisma): Dignity
    {
        return new static($intelligence, $will, $charisma);
    }

    public function getCode(): PropertyCode
    {
        return PropertyCode::getIt(PropertyCode::DIGNITY);
    }
}