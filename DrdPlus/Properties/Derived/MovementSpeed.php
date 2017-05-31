<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\Environment\TerrainCode;
use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Codes\Transport\MovementTypeCode;
use DrdPlus\Properties\Derived\Partials\AbstractDerivedProperty;
use DrdPlus\Tables\Environments\TerrainDifficultyPercents;
use DrdPlus\Tables\Measurements\Speed\SpeedBonus;
use DrdPlus\Calculations\SumAndRound;
use DrdPlus\Tables\Tables;

/**
 * See PPH page 112, right column, top, @link https://pph.drdplus.info/#pohybova_rychlost
 */
class MovementSpeed extends AbstractDerivedProperty
{
    /**
     * @param Speed $speed
     * @return MovementSpeed
     */
    public static function getIt(Speed $speed)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return new static(SumAndRound::half($speed->getValue()));
    }

    /**
     * @param Tables $tables
     * @return SpeedBonus
     */
    public function getSpeedBonus(Tables $tables)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return new SpeedBonus($this->getValue(), $tables->getSpeedTable());
    }

    /**
     * @param MovementTypeCode $movementTypeCode
     * @param TerrainCode $terrainCode
     * @param TerrainDifficultyPercents $terrainDifficultyPercents
     * @param Tables $tables
     * @param Athletics $athletics
     * @return SpeedBonus
     * @throws \DrdPlus\Tables\Body\MovementTypes\Exceptions\UnknownMovementType
     * @throws \DrdPlus\Tables\Environments\Exceptions\UnknownTerrainCode
     * @throws \DrdPlus\Tables\Environments\Exceptions\InvalidTerrainCodeFormat
     */
    public function getCurrentSpeedBonus(
        MovementTypeCode $movementTypeCode,
        TerrainCode $terrainCode,
        TerrainDifficultyPercents $terrainDifficultyPercents,
        Athletics $athletics,
        Tables $tables
    )
    {
        $speedBonusFromMovementType = $tables->getMovementTypesTable()->getSpeedBonus($movementTypeCode);
        $athleticsBonus = 0;
        if (in_array($movementTypeCode->getValue(), [MovementTypeCode::RUN, MovementTypeCode::SPRINT], true)) {
            $athleticsBonus = $athletics->getAthleticsBonus()->getValue();
        }
        $speedMalusFromTerrain = $tables->getImpassibilityOfTerrainTable()->getSpeedMalusOnTerrain(
            $terrainCode,
            $tables->getSpeedTable(),
            $terrainDifficultyPercents
        );

        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return new SpeedBonus(
            $this->getValue() + $speedBonusFromMovementType->getValue() + $athleticsBonus + $speedMalusFromTerrain->getValue(),
            $tables->getSpeedTable()
        );
    }

    /**
     * @return PropertyCode
     */
    public function getCode()
    {
        return PropertyCode::getIt(PropertyCode::MOVEMENT_SPEED);
    }

}