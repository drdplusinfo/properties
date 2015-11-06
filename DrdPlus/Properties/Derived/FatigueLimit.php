<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Properties\Derived\Parts\AbstractDerivedProperty;
use Granam\Integer\Tools\ToInteger;

class FatigueLimit extends AbstractDerivedProperty
{
    const FATIGUE_LIMIT = 'fatigue_limit';

    public static function calculateFatigueBonus(Endurance $endurance)
    {
        return $endurance->getValue() + 10;
    }

    public static function getIt($fatigueLimitValue)
    {
        return new static($fatigueLimitValue);
    }

    public function __construct($fatigueLimitValue)
    {
        $this->value = ToInteger::toInteger($fatigueLimitValue);
    }

    public function getCode()
    {
        return self::FATIGUE_LIMIT;
    }
}
