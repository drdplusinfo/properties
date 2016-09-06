<?php
namespace DrdPlus\Tests\Properties\Combat;

use DrdPlus\Properties\Combat\LoadingInRounds;
use DrdPlus\Tests\Properties\Combat\Partials\PositiveNumberCombatGameCharacteristicsTest;

class LoadingInRoundsTest extends PositiveNumberCombatGameCharacteristicsTest
{
    protected function createSut()
    {
        return new LoadingInRounds(123);
    }

}