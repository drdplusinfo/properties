<?php
namespace DrdPlus\Properties\Base;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Properties\Partials\AbstractIntegerProperty;
use Granam\Integer\IntegerInterface;

/**
 * @method static Will getIt(int | IntegerInterface $value)
 * @method Will add(int | IntegerInterface $value)
 * @method Will sub(int | IntegerInterface $value)
 */
class Will extends AbstractIntegerProperty implements BaseProperty
{
    /**
     * @return PropertyCode
     */
    public function getCode()
    {
        return PropertyCode::getIt(PropertyCode::WILL);
    }

}