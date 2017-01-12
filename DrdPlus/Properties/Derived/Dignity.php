<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Derived\Partials\AbstractAspectOfVisage;
use DrdPlus\Properties\Base\Intelligence;
use DrdPlus\Properties\Base\Will;

class Dignity extends AbstractAspectOfVisage
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