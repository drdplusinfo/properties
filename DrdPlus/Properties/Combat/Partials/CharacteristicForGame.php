<?php
declare(strict_types=1);
namespace DrdPlus\Properties\Combat\Partials;

use DrdPlus\Properties\Partials\WithHistoryTrait;
use Granam\Integer\Tools\ToInteger;

abstract class CharacteristicForGame extends CombatCharacteristic
{
    use WithHistoryTrait;

    /**
     * @param int
     * @throws \Granam\Integer\Tools\Exceptions\WrongParameterType
     * @throws \Granam\Integer\Tools\Exceptions\ValueLostOnCast
     */
    protected function __construct($value)
    {
        parent::__construct($value);
        $this->noticeChange();
    }

    /**
     * @param int|CharacteristicForGame $value
     * @return CharacteristicForGame
     * @throws \Granam\Integer\Tools\Exceptions\WrongParameterType
     * @throws \Granam\Integer\Tools\Exceptions\ValueLostOnCast
     */
    public function add($value): CharacteristicForGame
    {
        $increased = clone $this;
        $increased->value = $this->sanitizeValue($increased->value + ToInteger::toInteger($value));
        $increased->noticeChange();

        return $increased;
    }

    /**
     * @param int|CharacteristicForGame $value
     * @return CharacteristicForGame
     * @throws \Granam\Integer\Tools\Exceptions\WrongParameterType
     * @throws \Granam\Integer\Tools\Exceptions\ValueLostOnCast
     */
    public function sub($value): CharacteristicForGame
    {
        $decreased = clone $this;
        $decreased->value = $this->sanitizeValue($decreased->value - ToInteger::toInteger($value));
        $decreased->noticeChange();

        return $decreased;
    }
}