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
    public function getStrength();

    /**
     * @return Agility
     */
    public function getAgility();

    /**
     * @return Knack
     */
    public function getKnack();

    /**
     * @return Will
     */
    public function getWill();

    /**
     * @return Intelligence
     */
    public function getIntelligence();

    /**
     * @return Charisma
     */
    public function getCharisma();
}