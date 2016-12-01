<?php
namespace DrdPlus\Properties\Base;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\Partials\AbstractIntegerProperty;
use Granam\Integer\IntegerInterface;

/**
 * @method static Agility getIt(int|IntegerInterface $value)
 * @method Agility add(int|IntegerInterface $value)
 * @method Agility sub(int|IntegerInterface $value)
 */
class Agility extends AbstractIntegerProperty implements BaseProperty
{
    const AGILITY = PropertyCode::AGILITY;

    /**
     * @return string
     */
    public function getCode()
    {
        return self::AGILITY;
    }

}