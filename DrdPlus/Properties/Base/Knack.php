<?php
namespace DrdPlus\Properties\Base;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Properties\Partials\AbstractIntegerProperty;
use Granam\Integer\IntegerInterface;

/**
 * @method static Knack getIt(int | \Granam\Integer\IntegerInterface $value)
 * @method Knack add(int | \Granam\Integer\IntegerInterface $value)
 * @method Knack sub(int | \Granam\Integer\IntegerInterface $value)
 */
class Knack extends AbstractIntegerProperty implements BaseProperty
{
    /**
     * @return PropertyCode
     */
    public function getCode(): PropertyCode
    {
        return PropertyCode::getIt(PropertyCode::KNACK);
    }

}