<?php
namespace DrdPlus\Properties\Body;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Tables\Measurements\Weight\WeightBonus;
use Granam\Integer\IntegerInterface;
use Granam\Strict\Object\StrictObject;

/**
 * In fact bonus of weight in kg, @see \DrdPlus\Tables\Measurements\Weight\WeightBonus
 * @method BodyWeight add(int | IntegerInterface $value)
 * @method BodyWeight sub(int | IntegerInterface $value)
 */
class BodyWeight extends StrictObject implements BodyProperty, IntegerInterface
{
    /**
     * @param WeightBonus $weightBonus
     * @return BodyWeight
     */
    public static function getIt(WeightBonus $weightBonus): BodyWeight
    {
        return new static($weightBonus);
    }

    /**
     * @var int
     */
    private $value;

    /**
     * @param WeightBonus $weightBonus
     */
    private function __construct(WeightBonus $weightBonus)
    {
        $this->value = $weightBonus->getValue();
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string)$this->value;
    }

    /**
     * @return PropertyCode
     */
    public function getCode(): PropertyCode
    {
        return PropertyCode::getIt(PropertyCode::BODY_WEIGHT);
    }

}