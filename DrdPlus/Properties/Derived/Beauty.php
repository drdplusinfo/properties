<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Derived\Partials\AbstractAspectOfVisage;
use DrdPlus\Properties\Base\Knack;

class Beauty extends AbstractAspectOfVisage
{
    const BEAUTY = PropertyCode::BEAUTY;

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
     * @return string
     */
    public function getCode()
    {
        return self::BEAUTY;
    }
}