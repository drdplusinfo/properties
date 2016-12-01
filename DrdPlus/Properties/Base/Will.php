<?php
namespace DrdPlus\Properties\Base;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\Partials\AbstractIntegerProperty;
use Granam\Integer\IntegerInterface;

/**
 * @method static Will getIt(int|IntegerInterface $value)
 * @method Will add(int|IntegerInterface $value)
 * @method Will sub(int|IntegerInterface $value)
 */
class Will extends AbstractIntegerProperty implements BaseProperty
{
    const WILL = PropertyCode::WILL;

    /**
     * @return string
     */
    public function getCode()
    {
        return self::WILL;
    }

}