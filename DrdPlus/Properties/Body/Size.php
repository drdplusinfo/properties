<?php
namespace DrdPlus\Properties\Body;

use Granam\Integer\IntegerObject;

/**
 * note: Size does not need to be persisted and therefore does not need enum type.
 */
class Size extends IntegerObject
{
    const SIZE = 'size';

    /**
     * @return string
     */
    public function getName()
    {
        return self::SIZE;
    }
}
