<?php
namespace DrdPlus\Properties\Body;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\Partials\AbstractIntegerProperty;
use Granam\Integer\IntegerInterface;

/**
 * Note: Size does not need to be persisted and therefore does not need enum type.
 * Can be anytime calculated by race, gender and strength at first level.
 *
 * @see PPH page 33 left column
 */
/**
 * @method static Size getIt(int|IntegerInterface $value)
 * @method Size add(int|IntegerInterface $value)
 * @method Size sub(int|IntegerInterface $value)
 */
class Size extends AbstractIntegerProperty implements BodyProperty
{
    const SIZE = PropertyCode::SIZE;

    /**
     * @return string
     */
    public function getCode()
    {
        return self::SIZE;
    }

}