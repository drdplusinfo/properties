<?php
namespace DrdPlus\Properties\Body;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\Property;
use DrdPlus\Tables\Measurements\Distance\Distance;
use DrdPlus\Tables\Measurements\Distance\DistanceTable;
use Granam\Integer\IntegerInterface;
use Granam\Strict\Object\StrictObject;

/**
 * In fact bonus of a distance, @see \DrdPlus\Tables\Measurements\Distance\DistanceBonus
 */
class Height extends StrictObject implements Property, BodyProperty, IntegerInterface
{
    /**
     * @var int
     */
    private $value;

    /**
     * @param HeightInCm $heightInCm
     * @param DistanceTable $distanceTable
     */
    public function __construct(HeightInCm $heightInCm, DistanceTable $distanceTable)
    {
        $heightInMeters = $heightInCm->getValue() / 100;
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        $distance = new Distance($heightInMeters, Distance::M, $distanceTable);
        // height is bonus of distance in fact
        $this->value = $distance->getBonus()->getValue();
    }

    /**
     * @return PropertyCode
     */
    public function getCode()
    {
        return PropertyCode::getIt(PropertyCode::HEIGHT);
    }

    /**
     * It is bonus of distance in fact
     *
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->value;
    }

}