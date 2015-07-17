<?php
namespace DrdPlus\Properties;
use DrdPlus\Properties\Parts\BaseProperty;

/**
 * @method static Will getIt(int $value)
 * @see Property::getIt
 */
class Will extends BaseProperty
{
    const WILL = 'will';

    /**
     * @return string
     */
    public function getCode()
    {
        return self::WILL;
    }


}
