<?php
namespace DrdPlus\Properties\Body;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\Partials\AbstractIntegerProperty;
use Granam\Integer\IntegerInterface;

/**
 * @method static Age getIt(int | IntegerInterface $value)
 * @method Age add(int | IntegerInterface $value)
 * @method Age sub(int | IntegerInterface $value)
 */
class Age extends AbstractIntegerProperty implements BodyProperty
{
    /**
     * @return PropertyCode
     */
    public function getCode()
    {
        return PropertyCode::getIt(PropertyCode::AGE);
    }

}