<?php
namespace DrdPlus\Properties\Native;

use DrdPlus\Properties\Native\Parts\AbstractNativeProperty;

class Infravision extends AbstractNativeProperty
{
    const INFRAVISION = 'infravision';

    public function getCode()
    {
        return self::INFRAVISION;
    }
}
