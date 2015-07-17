<?php
namespace DrdPlus\Properties\Body;

use Granam\Integer\IntegerObject;

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
