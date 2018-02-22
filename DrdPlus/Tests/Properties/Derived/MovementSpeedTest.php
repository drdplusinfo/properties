<?php
declare(strict_types=1);/** be strict for parameter types, https://www.quora.com/Are-strict_types-in-PHP-7-not-a-bad-idea */
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Codes\Environment\TerrainCode;
use DrdPlus\Codes\Transport\MovementTypeCode;
use DrdPlus\Properties\Derived\Athletics;
use DrdPlus\Properties\Derived\MovementSpeed;
use DrdPlus\Properties\Derived\Speed;
use DrdPlus\Tables\Body\MovementTypes\MovementTypesTable;
use DrdPlus\Tables\Environments\ImpassibilityOfTerrainTable;
use DrdPlus\Tables\Environments\TerrainDifficultyPercents;
use DrdPlus\Tables\Measurements\Speed\SpeedBonus;
use DrdPlus\Tables\Measurements\Speed\SpeedTable;
use DrdPlus\Tables\Tables;
use DrdPlus\Tests\Properties\Derived\Partials\AbstractDerivedPropertyTest;
use Granam\Integer\PositiveInteger;

class MovementSpeedTest extends AbstractDerivedPropertyTest
{
    /**
     * @test
     * @return MovementSpeed
     */
    public function I_can_use_it(): MovementSpeed
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
    private function createSpeed($value): Speed
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
    ): Tables
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
     * @param int $speedBonusValue
     * @return \Mockery\MockInterface|MovementTypesTable
     */
    private function createMovementTypesTable(MovementTypeCode $expectedMovementType, int $speedBonusValue): MovementTypesTable
    {
        $movementTypesTable = $this->mockery(MovementTypesTable::class);
        $movementTypesTable->shouldReceive('getSpeedBonus')
            ->atLeast()->once()
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
        int $speedMalusValue
    ): ImpassibilityOfTerrainTable
    {
        $impassibilityOfTerrainTable = $this->mockery(ImpassibilityOfTerrainTable::class);
        $impassibilityOfTerrainTable->shouldReceive('getSpeedMalusOnTerrain')
            ->atLeast()->once()
            ->with($expectedTerrainCode, $this->type(SpeedTable::class), $expectedTerrainDifficultyPercents)
            ->andReturn($speedMalus = $this->mockery(SpeedBonus::class));
        $speedMalus->shouldReceive('getValue')
            ->andReturn($speedMalusValue);

        return $impassibilityOfTerrainTable;
    }

    /**
     * @test
     * @dataProvider provideMovementTypeAndAthleticsCounting
     * @param string $movementTypeName
     * @param bool $athleticsCountedIn
     */
    public function I_can_get_current_speed_bonus(string $movementTypeName, bool $athleticsCountedIn): void
    {
        $movementSpeed = MovementSpeed::getIt($this->createSpeed(45));
        $currentSpeedBonus = $movementSpeed->getCurrentSpeedBonus(
            $movementTypeCode = $this->createMovementTypeCode($movementTypeName),
            $terrainCode = TerrainCode::getIt(TerrainCode::DESERT),
            $terrainDifficultyPercents = $this->createDifficultyPercents(50),
            $this->createAthletics(987),
            $this->createTables($movementTypeCode, 123, $terrainCode, $terrainDifficultyPercents, -456)
        );
        self::assertInstanceOf(SpeedBonus::class, $currentSpeedBonus);
        self::assertSame(23 /* 45/2 */ + 123 - 456 + ($athleticsCountedIn ? 987 : 0), $currentSpeedBonus->getValue());
    }

    public function provideMovementTypeAndAthleticsCounting(): array
    {
        return [
            ['just some movement', false],
            [MovementTypeCode::WAITING, false],
            [MovementTypeCode::WALK, false],
            [MovementTypeCode::RUSH, false],
            [MovementTypeCode::RUN, true],
            [MovementTypeCode::SPRINT, true],
        ];
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|MovementTypeCode
     */
    private function createMovementTypeCode($value): MovementTypeCode
    {
        $movementTypeCode = $this->mockery(MovementTypeCode::class);
        $movementTypeCode->shouldReceive('getValue')
            ->andReturn($value);
        $movementTypeCode->shouldReceive('__toString')
            ->andReturn((string)$value);

        return $movementTypeCode;
    }

    /**
     * @param int $percents
     * @return \Mockery\MockInterface|TerrainDifficultyPercents
     */
    private function createDifficultyPercents(int $percents): TerrainDifficultyPercents
    {
        $difficultyPercents = $this->mockery(TerrainDifficultyPercents::class);
        $difficultyPercents->shouldReceive('getRate')
            ->andReturn($percents / 100);

        return $difficultyPercents;
    }

    /**
     * @param int $value
     * @return \Mockery\MockInterface|Athletics
     */
    private function createAthletics(int $value): Athletics
    {
        $athletics = $this->mockery(Athletics::class);
        $athletics->shouldReceive('getAthleticsBonus')
            ->andReturn($athleticsBonus = $this->mockery(PositiveInteger::class));
        $athleticsBonus->shouldReceive('getValue')
            ->andReturn($value);

        return $athletics;
    }
}