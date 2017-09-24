<?php
namespace DrdPlus\Properties\Combat;

use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Base\Intelligence;
use DrdPlus\Properties\Base\Knack;
use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Base\Will;

interface BaseProperties
{
    /**
     * @return Strength
     */
    public function getStrength(): Strength;

    /**
     * @return Agility
     */
    public function getAgility(): Agility;

    /**
     * @return Knack
     */
    public function getKnack(): Knack;

    /**
     * @return Will
     */
    public function getWill(): Will;

    /**
     * @return Intelligence
     */
    public function getIntelligence(): Intelligence;

    /**
     * @return Charisma
     */
    public function getCharisma(): Charisma;
}