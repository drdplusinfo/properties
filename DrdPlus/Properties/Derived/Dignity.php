<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Derived\Partials\AspectOfVisage;
use DrdPlus\Properties\Base\Intelligence;
use DrdPlus\Properties\Base\Will;

class Dignity extends AspectOfVisage
{
    /**
     * @param Intelligence $intelligence
     * @param Will $will
     * @param Charisma $charisma
     */
    public function __construct(Intelligence $intelligence, Will $will, Charisma $charisma)
    {
        parent::__construct($intelligence, $will, $charisma);
    }

    /**
     * @return PropertyCode
     */
    public function getCode()
    {
        return PropertyCode::getIt(PropertyCode::DIGNITY);
    }
}