<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\Derived\Partials\AbstractDerivedProperty;
use DrdPlus\Tables\Body\MovementTypes\MovementTypesTable;
use DrdPlus\Tables\Environments\ImpassibilityOfTerrainTable;
use DrdPlus\Tables\Environments\TerrainDifficultyPercents;
use DrdPlus\Tables\Measurements\Speed\SpeedBonus;
use DrdPlus\Tables\Measurements\Speed\SpeedTable;
use DrdPlus\Tools\Calculations\SumAndRound;

/**
 * See PPH page 112, right column, top
 */
class MovementSpeed extends AbstractDerivedProperty
{
    const MOVEMENT_SPEED = PropertyCode::MOVEMENT_SPEED;

    public function __construct(Speed $speed)
    {
        $this->value = SumAndRound::half($speed->getValue());
    }

    /**
     * @param SpeedTable $speedTable
     * @return SpeedBonus
     */
    public function getSpeedBonus(SpeedTable $speedTable)
    {
        return new SpeedBonus($this->getValue(), $speedTable);
    }

    /**
     * @param MovementTypesTable $movementTypesTable
     * @param string $movementTypeCode
     * @param SpeedTable $speedTable
     * @param string $terrainCode
     * @param TerrainDifficultyPercents $terrainDifficultyPercents
     * @param ImpassibilityOfTerrainTable $impassibilityOfTerrainTable
     * @return SpeedBonus
     * @throws \DrdPlus\Tables\Body\MovementTypes\Exceptions\UnknownMovementType
     * @throws \DrdPlus\Tables\Environments\Exceptions\UnknownTerrainCode
     * @throws \DrdPlus\Tables\Environments\Exceptions\InvalidTerrainCodeFormat
     */
    public function getCurrentSpeedBonus(
        MovementTypesTable $movementTypesTable,
        $movementTypeCode,
        SpeedTable $speedTable,
        $terrainCode,
        TerrainDifficultyPercents $terrainDifficultyPercents,
        ImpassibilityOfTerrainTable $impassibilityOfTerrainTable
    )
    {
        $movementTypeBonus = $movementTypesTable->getSpeedBonus($movementTypeCode);
        $terrainMalus = $impassibilityOfTerrainTable->getSpeedMalusOnTerrain(
            $terrainCode,
            $speedTable,
            $terrainDifficultyPercents
        );

        return new SpeedBonus(
            $this->getValue() + $movementTypeBonus->getValue() + $terrainMalus->getValue(),
            $speedTable
        );
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return self::MOVEMENT_SPEED;
    }

}