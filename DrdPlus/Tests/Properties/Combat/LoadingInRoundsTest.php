<?php
namespace DrdPlus\Tests\Properties\Combat;

use DrdPlus\Properties\Combat\LoadingInRounds;
use DrdPlus\Tests\Properties\Combat\Partials\PositiveNumberCombatCharacteristicsTest;

class LoadingInRoundsTest extends PositiveNumberCombatCharacteristicsTest
{
    /**
     * @return LoadingInRounds
     */
    protected function createSut()
    {
        return new LoadingInRounds(123);
    }
}