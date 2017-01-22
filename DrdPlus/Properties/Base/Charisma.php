<?php
namespace DrdPlus\Properties\Base;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Properties\Partials\AbstractIntegerProperty;
use Granam\Integer\IntegerInterface;

/**
 * @method static Charisma getIt(int | IntegerInterface $value)
 * @method Charisma add(int | IntegerInterface $value)
 * @method Charisma sub(int | IntegerInterface $value)
 */
class Charisma extends AbstractIntegerProperty implements BaseProperty
{
    /**
     * @return PropertyCode
     */
    public function getCode()
    {
        return PropertyCode::getIt(PropertyCode::CHARISMA);
    }

}