<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Properties\Derived\Parts\AbstractDerivedProperty;
use Granam\Integer\Tools\ToInteger;

class WoundsLimit extends AbstractDerivedProperty
{
    const WOUNDS_LIMIT = 'wounds_limit';

    public static function calculateWoundsBonus(Toughness $toughness)
    {
        return $toughness->getValue() + 10;
    }

    public static function getIt($woundLimitValue)
    {
        return new static($woundLimitValue);
    }

    public function __construct($woundLimitValue)
    {
        $this->value = ToInteger::toInteger($woundLimitValue);
    }

    public function getCode()
    {
        return self::WOUNDS_LIMIT;
    }
}
