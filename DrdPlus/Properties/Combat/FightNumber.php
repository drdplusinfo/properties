<?php
namespace DrdPlus\Properties\Combat;

use DrdPlus\Codes\ProfessionCode;
use DrdPlus\Properties\Body\Height;
use DrdPlus\Properties\Combat\Partials\CombatGameCharacteristic;
use DrdPlus\Tools\Calculations\SumAndRound;
use Granam\Integer\IntegerInterface;
use Granam\Tools\ValueDescriber;

/**
 * @method FightNumber add(int|IntegerInterface $value)
 * @method FightNumber sub(int|IntegerInterface $value)
 */
class FightNumber extends CombatGameCharacteristic
{

    /**
     * @param ProfessionCode $professionCode
     * @param BaseProperties $baseProperties
     * @param Height $height
     * @throws \DrdPlus\Properties\Combat\Exceptions\UnknownProfession
     */
    public function __construct(ProfessionCode $professionCode, BaseProperties $baseProperties, Height $height)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        parent::__construct($this->calculateValue($professionCode, $baseProperties, $height));
    }

    /**
     * @param ProfessionCode $professionCode
     * @param BaseProperties $baseProperties
     * @param Height $height
     * @return int
     * @throws \DrdPlus\Properties\Combat\Exceptions\UnknownProfession
     */
    private function calculateValue(ProfessionCode $professionCode, BaseProperties $baseProperties, Height $height)
    {
        $modifierByHeight = SumAndRound::ceiledThird($height->getValue()) - 2;
        switch ($professionCode->getValue()) {
            case ProfessionCode::FIGHTER :
                return $baseProperties->getAgility()->getValue() + $modifierByHeight;
            case ProfessionCode::THIEF :
            case ProfessionCode::RANGER : // same as a thief
                return SumAndRound::average($baseProperties->getAgility()->getValue(), $baseProperties->getKnack()->getValue())
                    + $modifierByHeight;
            case ProfessionCode::WIZARD :
            case ProfessionCode::THEURGIST : // same as a wizard
                return SumAndRound::average($baseProperties->getAgility()->getValue(), $baseProperties->getIntelligence()->getValue())
                    + $modifierByHeight;
            case ProfessionCode::PRIEST :
                return SumAndRound::average($baseProperties->getAgility()->getValue(), $baseProperties->getCharisma()->getValue())
                    + $modifierByHeight;
            default :
                throw new Exceptions\UnknownProfession(
                    'Unknown profession of code ' . ValueDescriber::describe($professionCode->getValue())
                );
        }
    }
}