<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Derived\Partials\AbstractAspectOfVisage;
use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Base\Will;

class Dangerousness extends AbstractAspectOfVisage
{
    /**
     * @param Strength $strength
     * @param Will $will
     * @param Charisma $charisma
     */
    public function __construct(Strength $strength, Will $will, Charisma $charisma)
    {
        parent::__construct($strength, $will, $charisma);
    }

    /**
     * @return PropertyCode
     */
    public function getCode()
    {
        return PropertyCode::getIt(PropertyCode::DANGEROUSNESS);
    }
}