<?php
namespace DrdPlus\Properties\Base;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Properties\Partials\AbstractIntegerProperty;

/**
 * @method static Strength getIt(int | \Granam\Integer\IntegerInterface $value)
 * @method Strength add(int | \Granam\Integer\IntegerInterface $value)
 * @method Strength sub(int | \Granam\Integer\IntegerInterface $value)
 */
class Strength extends AbstractIntegerProperty implements BaseProperty
{
    /**
     * @return PropertyCode
     */
    public function getCode(): PropertyCode
    {
        return PropertyCode::getIt(PropertyCode::STRENGTH);
    }

}