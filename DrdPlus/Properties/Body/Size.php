<?php
namespace DrdPlus\Properties\Body;

use DrdPlus\Properties\PropertyInterface;
use Granam\Integer\IntegerObject;

/**
 * note: Size does not need to be persisted and therefore does not need enum type.
 */
class Size extends IntegerObject implements PropertyInterface
{
    const SIZE = 'size';

    /**
     * @return string
     */
    public function getCode()
    {
        return self::SIZE;
    }

}
