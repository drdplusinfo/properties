<?php
namespace DrdPlus\Properties\Base;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\Partials\AbstractIntegerProperty;
use Granam\Integer\IntegerInterface;

/**
 * @method static Intelligence getIt(int|IntegerInterface $value)
 * @method Intelligence add(int|IntegerInterface $value)
 * @method Intelligence sub(int|IntegerInterface $value)
 */
class Intelligence extends AbstractIntegerProperty implements BaseProperty
{
    const INTELLIGENCE = PropertyCode::INTELLIGENCE;

    /**
     * @return string
     */
    public function getCode()
    {
        return self::INTELLIGENCE;
    }

}