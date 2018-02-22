<?php
declare(strict_types=1);/** be strict for parameter types, https://www.quora.com/Are-strict_types-in-PHP-7-not-a-bad-idea */
namespace DrdPlus\Properties\Base;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Properties\Partials\AbstractIntegerProperty;

/**
 * @method static Will getIt(int | \Granam\Integer\IntegerInterface $value)
 * @method Will add(int | \Granam\Integer\IntegerInterface $value)
 * @method Will sub(int | \Granam\Integer\IntegerInterface $value)
 */
class Will extends AbstractIntegerProperty implements BaseProperty
{
    /**
     * @return PropertyCode
     */
    public function getCode(): PropertyCode
    {
        return PropertyCode::getIt(PropertyCode::WILL);
    }

}