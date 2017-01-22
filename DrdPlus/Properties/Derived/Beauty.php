<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Derived\Partials\AbstractAspectOfVisage;
use DrdPlus\Properties\Base\Knack;

class Beauty extends AbstractAspectOfVisage
{
    /**
     * @param Agility $agility
     * @param Knack $knack
     * @param Charisma $charisma
     */
    public function __construct(Agility $agility, Knack $knack, Charisma $charisma)
    {
        parent::__construct($agility, $knack, $charisma);
    }

    /**
     * @return PropertyCode
     */
    public function getCode()
    {
        return PropertyCode::getIt(PropertyCode::BEAUTY);
    }
}