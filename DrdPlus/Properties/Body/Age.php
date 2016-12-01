<?php
namespace DrdPlus\Properties\Body;

use DrdPlus\Properties\Partials\AbstractIntegerProperty;
use Granam\Integer\IntegerInterface;

/**
 * @method static Age getIt(int|IntegerInterface $value)
 * @method Age add(int|IntegerInterface $value)
 * @method Age sub(int|IntegerInterface $value)
 */
class Age extends AbstractIntegerProperty implements BodyProperty
{
    const AGE = 'age';

    /**
     * @return string
     */
    public function getCode()
    {
        return self::AGE;
    }

}