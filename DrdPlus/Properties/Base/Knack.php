<?php
namespace DrdPlus\Properties\Base;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\Partials\AbstractIntegerProperty;
use Granam\Integer\IntegerInterface;

/**
 * @method static Knack getIt(int | IntegerInterface $value)
 * @method Knack add(int | IntegerInterface $value)
 * @method Knack sub(int | IntegerInterface $value)
 */
class Knack extends AbstractIntegerProperty implements BaseProperty
{
    /**
     * @return PropertyCode
     */
    public function getCode()
    {
        return PropertyCode::getIt(PropertyCode::KNACK);
    }

}