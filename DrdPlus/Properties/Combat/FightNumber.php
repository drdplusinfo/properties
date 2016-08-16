<?php
namespace DrdPlus\Properties\Combat;

use DrdPlus\Codes\ProfessionCode;
use DrdPlus\Properties\Body\Size;
use DrdPlus\Properties\Base\Charisma;
use DrdPlus\Properties\Base\Intelligence;
use DrdPlus\Properties\Base\Knack;
use DrdPlus\Properties\Base\Agility;
use DrdPlus\Tools\Calculations\SumAndRound;
use Granam\Tools\ValueDescriber;

class FightNumber extends CombatGameCharacteristic
{

    /**
     * @param ProfessionCode $professionCode
     * @param BasePropertiesInterface $baseProperties
     * @param Size $size
     * @throws \DrdPlus\Properties\Combat\Exceptions\UnknownProfession
     */
    public function __construct(
        ProfessionCode $professionCode,
        BasePropertiesInterface $baseProperties,
        Size $size
    )
    {
        parent::__construct($this->calculateValue($professionCode, $baseProperties, $size));
    }

    /**
     * @param ProfessionCode $professionCode
     * @param BasePropertiesInterface $baseProperties
     * @param Size $size
     * @return int
     * @throws \DrdPlus\Properties\Combat\Exceptions\UnknownProfession
     */
    private function calculateValue(ProfessionCode $professionCode, BasePropertiesInterface $baseProperties, Size $size)
    {
        switch ($professionCode->getValue()) {
            case ProfessionCode::FIGHTER :
                return $this->calculateFighterFightValue($baseProperties->getAgility(), $size);
            case ProfessionCode::THIEF :
                return $this->calculateThiefFightValue($baseProperties->getAgility(), $baseProperties->getKnack(), $size);
            case ProfessionCode::RANGER :
                return $this->calculateRangerFightValue($baseProperties->getAgility(), $baseProperties->getKnack(), $size);
            case ProfessionCode::WIZARD :
                return $this->calculateWizardFightValue($baseProperties->getAgility(), $baseProperties->getIntelligence(), $size);
            case ProfessionCode::THEURGIST :
                return $this->calculateTheurgistFightValue($baseProperties->getAgility(), $baseProperties->getIntelligence(), $size);
            case ProfessionCode::PRIEST :
                return $this->calculatePriestFightValue($baseProperties->getAgility(), $baseProperties->getCharisma(), $size);
            default :
                throw new Exceptions\UnknownProfession(
                    'Unknown profession of code ' . ValueDescriber::describe($professionCode->getValue())
                );
        }
    }

    private function calculateFighterFightValue(Agility $agility, Size $size)
    {
        return $agility->getValue() + $this->calculateModifierBySize($size);
    }

    private function calculateModifierBySize(Size $size)
    {
        return SumAndRound::ceiledThird($size->getValue()) - 2;
    }

    private function calculateThiefFightValue(Agility $agility, Knack $knack, Size $size)
    {
        return SumAndRound::average($agility->getValue(), $knack->getValue()) + $this->calculateModifierBySize($size);
    }

    private function calculateRangerFightValue(Agility $agility, Knack $knack, Size $size)
    {
        // same as a thief
        return SumAndRound::average($agility->getValue(), $knack->getValue()) + $this->calculateModifierBySize($size);
    }

    private function calculateWizardFightValue(Agility $agility, Intelligence $intelligence, Size $size)
    {
        return SumAndRound::average($agility->getValue(), $intelligence->getValue()) + $this->calculateModifierBySize($size);
    }

    private function calculateTheurgistFightValue(Agility $agility, Intelligence $intelligence, Size $size)
    {
        // same as a wizard
        return SumAndRound::average($agility->getValue(), $intelligence->getValue()) + $this->calculateModifierBySize($size);
    }

    private function calculatePriestFightValue(Agility $agility, Charisma $charisma, Size $size)
    {
        return SumAndRound::average($agility->getValue(), $charisma->getValue()) + $this->calculateModifierBySize($size);
    }

}