<?php
namespace DrdPlus\Tests\Properties\Derived;

use DrdPlus\Codes\TerrainCodes;
use DrdPlus\Properties\Derived\MovementSpeed;
use DrdPlus\Properties\Derived\Speed;
use DrdPlus\Tables\Body\MovementTypes\MovementTypesTable;
use DrdPlus\Tables\Environments\DifficultyPercents;
use DrdPlus\Tables\Environments\ImpassibilityOfTerrainTable;
use DrdPlus\Tables\Measurements\Speed\SpeedBonus;
use DrdPlus\Tables\Measurements\Speed\SpeedTable;
use Granam\Tests\Tools\TestWithMockery;

class MovementSpeedTest extends TestWithMockery
{
    /**
     * @test
     */
    public function I_can_use_it()
    {
        $movementSpeed = new MovementSpeed($this->createSpeed(123));
        self::assertSame('movement_speed', $movementSpeed->getCode());
        $speedBonus = $movementSpeed->getSpeedBonus($this->createSpeedTable());
        self::assertInstanceOf(SpeedBonus::class, $speedBonus);
        self::assertSame(62, $speedBonus->getValue(), 'Expected half of movement speed as a speed bonus');
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
     * @return \Mockery\MockInterface|SpeedTable
     */
    private function createSpeedTable()
    {
        return $this->mockery(SpeedTable::class);
    }

    /**
     * @test
     */
    public function I_can_get_current_speed_bonus()
    {
        $movementSpeed = new MovementSpeed($this->createSpeed(45));
        $currentSpeedBonus = $movementSpeed->getCurrentSpeedBonus(
            $this->createMovementTypesTable('foo movement', 123),
            'foo movement',
            $this->createSpeedTable(),
            TerrainCodes::DESERT,
            $this->createDifficultyPercents(50),
            new ImpassibilityOfTerrainTable()
        );
        self::assertInstanceOf(SpeedBonus::class, $currentSpeedBonus);
        self::assertSame(23 /* round(45 / 2) */ + 123 + (-13 /* desert 50% malus */), $currentSpeedBonus->getValue());
    }

    /**
     * @param $expectedMovementType
     * @param $speedBonusValue
     * @return \Mockery\MockInterface|MovementTypesTable
     */
    private function createMovementTypesTable($expectedMovementType, $speedBonusValue)
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
     * @param $percents
     * @return \Mockery\MockInterface|DifficultyPercents
     */
    private function createDifficultyPercents($percents)
    {
        $difficultyPercents = $this->mockery(DifficultyPercents::class);
        $difficultyPercents->shouldReceive('getRate')
            ->andReturn($percents / 100);

        return $difficultyPercents;
    }
}
