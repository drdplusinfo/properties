<?php
declare(strict_types=1);/** be strict for parameter types, https://www.quora.com/Are-strict_types-in-PHP-7-not-a-bad-idea */
namespace DrdPlus\Tests\Properties\Combat;

use DrdPlus\Codes\Armaments\WeaponlikeCode;
use DrdPlus\Properties\Combat\Fight;
use DrdPlus\Properties\Combat\FightNumber;
use DrdPlus\Tables\Armaments\Armourer;
use DrdPlus\Tables\Tables;
use DrdPlus\Tests\Properties\Combat\Partials\CharacteristicForGameTest;

class FightNumberTest extends CharacteristicForGameTest
{
    protected function createSut()
    {
        return FightNumber::getIt(
            $this->createFight(123),
            $weaponlikeCode = $this->createWeaponlikeCode(),
            $this->createTables($weaponlikeCode, 456)
        );
    }

    /**
     * @param $value
     * @return \Mockery\MockInterface|Fight
     */
    private function createFight($value)
    {
        $fight = $this->mockery(Fight::class);
        $fight->shouldReceive('getValue')
            ->andReturn($value);
        $fight->shouldReceive('__toString')
            ->andReturn((string)$value);

        return $fight;
    }

    /**
     * @return \Mockery\MockInterface|WeaponlikeCode
     */
    private function createWeaponlikeCode()
    {
        return $this->mockery(WeaponlikeCode::class);
    }

    /**
     * @param WeaponlikeCode $weaponlikeCode
     * @param int $length
     * @return \Mockery\MockInterface|Tables
     */
    private function createTables(WeaponlikeCode $weaponlikeCode, $length)
    {
        $tables = $this->mockery(Tables::class);
        $tables->shouldReceive('getArmourer')
            ->andReturn($armourer = $this->mockery(Armourer::class));
        $armourer->shouldReceive('getLengthOfWeaponOrShield')
            ->zeroOrMoreTimes()
            ->with($weaponlikeCode)
            ->andReturn($length);

        return $tables;
    }

    /**
     * @test
     */
    public function I_can_get_property_easily()
    {
        $fightNumber = FightNumber::getIt(
            $this->createFight(123),
            $weaponlikeCode = $this->createWeaponlikeCode(),
            $this->createTables($weaponlikeCode, 456)
        );
        self::assertSame(579, $fightNumber->getValue());
    }

}