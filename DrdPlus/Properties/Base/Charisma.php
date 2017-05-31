<?php
namespace DrdPlus\Properties\Base;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Properties\Partials\AbstractIntegerProperty;

/**
 * @method static Charisma getIt(int | \Granam\Integer\IntegerInterface $value)
 * @method Charisma add(int | \Granam\Integer\IntegerInterface $value)
 * @method Charisma sub(int | \Granam\Integer\IntegerInterface $value)
 */
class Charisma extends AbstractIntegerProperty implements BaseProperty
{
    /**
     * @return PropertyCode
     */
    public function getCode(): PropertyCode
    {
        return PropertyCode::getIt(PropertyCode::CHARISMA);
    }

}