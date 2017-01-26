<?php
namespace DrdPlus\Tests\Properties\Base;

use DrdPlus\Tests\Properties\ItHasProperlyAnnotatedCodeGetter;
use DrdPlus\Tests\Properties\Partials\AbstractIntegerPropertyTest;

abstract class BasePropertyTest extends AbstractIntegerPropertyTest
{
    use ItHasProperlyAnnotatedCodeGetter;
}