<?php
namespace DrdPlus\Properties\Combat;

use DrdPlus\Codes\CombatCharacteristicCode;
use DrdPlus\Properties\Base\Agility;
use DrdPlus\Calculations\SumAndRound;
use DrdPlus\Properties\Body\Size;
use DrdPlus\Properties\Combat\Partials\CombatCharacteristic;

/**
 * See PPH page 34 left column, @link https://pph.drdplus.jaroslavtyc.com/#tabulka_bojovych_charakteristik
 * Defense can change only with Agility.
 * See PPH page 104 right column top, @link https://pph.drdplus.jaroslavtyc.com/#oprava_za_velikost
 * Despite rules this library deducts half of size from defense number, instead of adding to attack number,
 * because it is more practical from numbers-point-of-view.
 */
class Defense extends CombatCharacteristic
{
    /**
     * @var int
     */
    private $modifierBySize;

    /**
     * @param Agility $agility
     * @param Size $size
     * @return Defense
     */
    public static function getIt(Agility $agility, Size $size)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return new static(SumAndRound::ceiledHalf($agility->getValue()), SumAndRound::half($size->getValue()));
    }

    /**
     * @param int $value
     * @param int $modifierBySize
     */
    protected function __construct($value, $modifierBySize)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        parent::__construct($value);
        $this->modifierBySize = $modifierBySize;
    }

    /**
     * @return int
     */
    public function getValueAgainstShooting()
    {
        return $this->getValue() - $this->modifierBySize;
    }

    /**
     * @return CombatCharacteristicCode
     */
    public function getCode()
    {
        return CombatCharacteristicCode::getIt(CombatCharacteristicCode::DEFENSE);
    }
}