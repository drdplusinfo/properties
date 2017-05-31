<?php
namespace DrdPlus\Properties\Base;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Properties\Partials\AbstractIntegerProperty;

/**
 * @method static Intelligence getIt(int | \Granam\Integer\IntegerInterface $value)
 * @method Intelligence add(int | \Granam\Integer\IntegerInterface $value)
 * @method Intelligence sub(int | \Granam\Integer\IntegerInterface $value)
 */
class Intelligence extends AbstractIntegerProperty implements BaseProperty
{
    /**
     * @return PropertyCode
     */
    public function getCode(): PropertyCode
    {
        return PropertyCode::getIt(PropertyCode::INTELLIGENCE);
    }

}