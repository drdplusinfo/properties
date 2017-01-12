<?php
namespace DrdPlus\Properties\Base;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\Partials\AbstractIntegerProperty;
use Granam\Integer\IntegerInterface;

/**
 * @method static Strength getIt(int | IntegerInterface $value)
 * @method Strength add(int | IntegerInterface $value)
 * @method Strength sub(int | IntegerInterface $value)
 */
class Strength extends AbstractIntegerProperty implements BaseProperty
{
    /**
     * @return PropertyCode
     */
    public function getCode()
    {
        return PropertyCode::getIt(PropertyCode::STRENGTH);
    }

}