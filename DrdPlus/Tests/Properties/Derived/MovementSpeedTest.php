<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Codes\Environment\TerrainCode;
use DrdPlus\Codes\Transport\MovementTypeCode;
use DrdPlus\Properties\Derived\MovementSpeed;
use DrdPlus\Properties\Derived\Speed;
use DrdPlus\Tables\Body\MovementTypes\MovementTypesTable;
use DrdPlus\Tables\Environments\ImpassibilityOfTerrainTable;
use DrdPlus\Tables\Environments\TerrainDifficultyPercents;
use DrdPlus\Tables\Measurements\Speed\SpeedBonus;
use DrdPlus\Tables\Measurements\Speed\SpeedTable;
use DrdPlus\Tables\Tables;
use DrdPlus\Tests\Properties\Derived\Partials\AbstractDerivedPropertyTest;

class MovementSpeedTest extends AbstractDerivedPropertyTest
{
    /**
     * @test
     * @return MovementSpeed
     */
    public function I_can_use_it()
    {
        $movementSpeed = MovementSpeed::getIt($this->createSpeed(123));
        $speedBonus = $movementSpeed->getSpeedBonus($this->createTables());
        self::assertInstanceOf(SpeedBonus::class, $speedBonus);
        self::assertSame(62, $speedBonus->getValue(), 'Expected half of movement speed as a speed bonus');

        return $movementSpeed;
    }

    /**
     * @param int $value
     * @return \Mockery\MockInterface|Speed
     */
    private function createSpeed($value)
    {
        $speed = $this->mockery(Speed::class);
        $speed->shouldReceive('getValue')
            ->andReturn($value);

        return $speed;
    }

    /**
     * @param MovementTypeCode $expectedMovementType
     * @param $speedBonusValue
     * @param TerrainCode $expectedTerrainCode = null
     * @param TerrainDifficultyPercents $expectedTerrainDifficultyPercents
     * @param $terrainMalusValue
     * @return \Mockery\MockInterface|Tables
     */
    private function createTables(
        MovementTypeCode $expectedMovementType = null,
        $speedBonusValue = null,
        TerrainCode $expectedTerrainCode = null,
        TerrainDifficultyPercents $expectedTerrainDifficultyPercents = null,
        $terrainMalusValue = null
    )
    {
        $tables = $this->mockery(Tables::class);
        $tables->shouldReceive('getSpeedTable')
            ->andReturn($this->mockery(SpeedTable::class));
        if ($expectedMovementType !== null || $speedBonusValue !== null) {
            $tables->shouldReceive('getMovementTypesTable')
                ->andReturn($this->createMovementTypesTable($expectedMovementType, $speedBonusValue));
        }
        if ($expectedTerrainCode !== null || $expectedTerrainDifficultyPercents !== null) {
            $tables->shouldReceive('getImpassibilityOfTerrainTable')
                ->andReturn($this->createImpassibilityOfTerrainTable(
                    $expectedTerrainCode,
                    $expectedTerrainDifficultyPercents,
                    $terrainMalusValue
                ));
        }

        return $tables;
    }

    /**
     * @param MovementTypeCode $expectedMovementType
     * @param $speedBonusValue
     * @return \Mockery\MockInterface|MovementTypesTable
     */
    private function createMovementTypesTable(MovementTypeCode $expectedMovementType, $speedBonusValue)
    {
        $movementTypesTable = $this->mockery(MovementTypesTable::class);
        $movementTypesTable->shouldReceive('getSpeedBonus')
            ->with($expectedMovementType)
            ->andReturn($speedBonus = $this->mockery(SpeedBonus::class));
        $speedBonus->shouldReceive('getValue')
            ->andReturn($speedBonusValue);

        return $movementTypesTable;
    }

    /**
     * @param TerrainCode $expectedTerrainCode
     * @param TerrainDifficultyPercents $expectedTerrainDifficultyPercents
     * @param $speedMalusValue
     * @return \Mockery\MockInterface|ImpassibilityOfTerrainTable
     */
    private function createImpassibilityOfTerrainTable(
        TerrainCode $expectedTerrainCode,
        TerrainDifficultyPercents $expectedTerrainDifficultyPercents,
        $speedMalusValue
    )
    {
        $impassibilityOfTerrainTable = $this->mockery(ImpassibilityOfTerrainTable::class);
        $impassibilityOfTerrainTable->shouldReceive('getSpeedMalusOnTerrain')
            ->with($expectedTerrainCode, $this->type(SpeedTable::class), $expectedTerrainDifficultyPercents)
            ->andReturn($speedMalus = $this->mockery(SpeedBonus::class));
        $speedMalus->shouldReceive('getValue')
            ->andReturn($speedMalusValue);

        return $impassibilityOfTerrainTable;
    }

    /**
     * @test
     */
    public function I_can_get_current_speed_bonus()
    {
        $movementSpeed = MovementSpeed::getIt($this->createSpeed(45));
        $currentSpeedBonus = $movementSpeed->getCurrentSpeedBonus(
            $movementTypeCode = $this->createMovementTypeCode('foo movement'),
            $terrainCode = TerrainCode::getIt(TerrainCode::DESERT),
            $terrainDifficultyPercents = $this->createDifficultyPercents(50),
            $this->createTables($movementTypeCode, 123, $terrainCode, $terrainDifficultyPercents, -456)
        );
        self::assertInstanceOf(SpeedBonus::class, $currentSpeedBonus);
        self::assertSame(23 /* 45/2 */ + 123 - 456, $currentSpeedBonus->getValue());
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|MovementTypeCode
     */
    private function createMovementTypeCode($value)
    {
        $movementTypeCode = $this->mockery(MovementTypeCode::class);
        $movementTypeCode->shouldReceive('getValue')
            ->andReturn($value);
        $movementTypeCode->shouldReceive('__toString')
            ->andReturn((string)$value);

        return $movementTypeCode;
    }

    /**
     * @param $percents
     * @return \Mockery\MockInterface|TerrainDifficultyPercents
     */
    private function createDifficultyPercents($percents)
    {
        $difficultyPercents = $this->mockery(TerrainDifficultyPercents::class);
        $difficultyPercents->shouldReceive('getRate')
            ->andReturn($percents / 100);

        return $difficultyPercents;
    }
}