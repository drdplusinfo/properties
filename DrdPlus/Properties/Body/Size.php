<?php
namespace DrdPlus\Properties\Body;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Properties\Partials\AbstractIntegerProperty;
use Granam\Integer\IntegerInterface;

/**
 * Note: Size does not need to be persisted and therefore does not need enum type.
 * Can be anytime calculated by race, gender and strength at first level.
 *
 * @see PPH page 33 left column, https://pph.drdplus.info/#velikost_vel_a_hmotnost_postavy_hmp
 */
/**
 * @method static Size getIt(int | \Granam\Integer\IntegerInterface $value)
 * @method Size add(int | \Granam\Integer\IntegerInterface $value)
 * @method Size sub(int | \Granam\Integer\IntegerInterface $value)
 */
class Size extends AbstractIntegerProperty implements BodyProperty
{
    /**
     * @return PropertyCode
     */
    public function getCode(): PropertyCode
    {
        return PropertyCode::getIt(PropertyCode::SIZE);
    }

}