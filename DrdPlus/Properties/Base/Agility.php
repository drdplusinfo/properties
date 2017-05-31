<?php
namespace DrdPlus\Properties\Base;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Properties\Partials\AbstractIntegerProperty;

/**
 * @method static Agility getIt(int | \Granam\Integer\IntegerInterface $value)
 * @method Agility add(int | \Granam\Integer\IntegerInterface $value)
 * @method Agility sub(int | \Granam\Integer\IntegerInterface $value)
 */
class Agility extends AbstractIntegerProperty implements BaseProperty
{
    /**
     * @return PropertyCode
     */
    public function getCode(): PropertyCode
    {
        return PropertyCode::getIt(PropertyCode::AGILITY);
    }

}