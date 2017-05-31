<?php
namespace DrdPlus\Properties\Base;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Properties\Partials\AbstractIntegerProperty;

/**
 * @method static Will getIt(int | \Granam\Integer\IntegerInterface $value)
 * @method Will add(int | \Granam\Integer\IntegerInterface $value)
 * @method Will sub(int | \Granam\Integer\IntegerInterface $value)
 */
class Will extends AbstractIntegerProperty implements BaseProperty
{
    /**
     * @return PropertyCode
     */
    public function getCode(): PropertyCode
    {
        return PropertyCode::getIt(PropertyCode::WILL);
    }

}