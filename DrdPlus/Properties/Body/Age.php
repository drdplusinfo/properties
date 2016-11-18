<?php
namespace DrdPlus\Properties\Body;

use DrdPlus\Properties\Partials\AbstractIntegerProperty;

/**
 * @method static Age getIt(int $value)
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