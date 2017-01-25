<?php
namespace DrdPlus\Properties\Combat;

use DrdPlus\Codes\ProfessionCode;
use DrdPlus\Properties\Body\Height;
use DrdPlus\Properties\Combat\Partials\CombatCharacteristic;
use DrdPlus\Calculations\SumAndRound;
use DrdPlus\Tables\Tables;
use Granam\Tools\ValueDescriber;

/**
 * @method Fight add(int | IntegerInterface $value)
 * @method Fight sub(int | IntegerInterface $value)
 */
class Fight extends CombatCharacteristic
{

    /**
     * @param ProfessionCode $professionCode
     * @param BaseProperties $baseProperties
     * @param Height $height
     * @param Tables $tables
     * @throws \DrdPlus\Properties\Combat\Exceptions\UnknownProfession
     */
    public function __construct(
        ProfessionCode $professionCode,
        BaseProperties $baseProperties,
        Height $height,
        Tables $tables
    )
    {
        $fightValue = $this->getFightNumberByProfession($professionCode, $baseProperties);
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        $fightValue += $tables->getCorrectionByHeightTable()->getCorrectionByHeight($height);
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        parent::__construct($fightValue);
    }

    /**
     * See PPH page 34 left column, @link https://pph.drdplus.jaroslavtyc.com/#tabulka_boje
     *
     * @param ProfessionCode $professionCode
     * @param BaseProperties $baseProperties
     * @return int
     * @throws \DrdPlus\Properties\Combat\Exceptions\UnknownProfession
     */
    private function getFightNumberByProfession(ProfessionCode $professionCode, BaseProperties $baseProperties)
    {
        switch ($professionCode->getValue()) {
            case ProfessionCode::FIGHTER :
                return $baseProperties->getAgility()->getValue();
            case ProfessionCode::THIEF :
            case ProfessionCode::RANGER : // same as a thief
                return SumAndRound::average($baseProperties->getAgility()->getValue(), $baseProperties->getKnack()->getValue());
            case ProfessionCode::WIZARD :
            case ProfessionCode::THEURGIST : // same as a wizard
                return SumAndRound::average($baseProperties->getAgility()->getValue(), $baseProperties->getIntelligence()->getValue());
            case ProfessionCode::PRIEST :
                return SumAndRound::average($baseProperties->getAgility()->getValue(), $baseProperties->getCharisma()->getValue());
            default :
                throw new Exceptions\UnknownProfession(
                    'Unknown profession of code ' . ValueDescriber::describe($professionCode->getValue())
                );
        }
    }
}