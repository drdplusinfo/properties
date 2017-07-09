<?php
namespace DrdPlus\Properties\Body;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Tables\Tables;
use Granam\Integer\IntegerInterface;
use DrdPlus\Tables\Measurements\Weight\Weight as WeightMeasurement;
use Granam\Strict\Object\StrictObject;

/**
 * In fact bonus of weight in kg, @see \DrdPlus\Tables\Measurements\Weight\WeightBonus
 * @method Weight add(int | IntegerInterface $value)
 * @method Weight sub(int | IntegerInterface $value)
 */
class Weight extends StrictObject implements BodyProperty, IntegerInterface
{
    /**
     * @param WeightInKg $weightInKg
     * @param Tables $tables
     * @return Weight
     */
    public static function getIt(WeightInKg $weightInKg, Tables $tables): Weight
    {
        return new static($weightInKg, $tables);
    }

    /**
     * @var int
     */
    private $value;

    /**
     * @param WeightInKg $weightInKg
     * @param Tables $tables
     */
    private function __construct(WeightInKg $weightInKg, Tables $tables)
    {
        $weightMeasurement = new WeightMeasurement(
            $weightInKg->getValue(),
            WeightMeasurement::KG,
            $tables->getWeightTable()
        );
        $this->value = $weightMeasurement->getBonus()->getValue();
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
        return PropertyCode::getIt(PropertyCode::WEIGHT);
    }

}