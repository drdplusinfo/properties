<?php
namespace DrdPlus\Properties\Base;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\Partials\AbstractIntegerProperty;
use Granam\Integer\IntegerInterface;

/**
 * @method static Knack getIt(int|IntegerInterface $value)
 * @method Knack add(int|IntegerInterface $value)
 * @method Knack sub(int|IntegerInterface $value)
 */
class Knack extends AbstractIntegerProperty implements BaseProperty
{
    const KNACK = PropertyCode::KNACK;

    /**
     * @return string
     */
    public function getCode()
    {
        return self::KNACK;
    }

}