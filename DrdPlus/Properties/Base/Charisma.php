<?php
namespace DrdPlus\Properties\Base;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\Partials\AbstractIntegerProperty;
use Granam\Integer\IntegerInterface;

/**
 * @method static Charisma getIt(int|IntegerInterface $value)
 * @method Charisma add(int|IntegerInterface $value)
 * @method Charisma sub(int|IntegerInterface $value)
 */
class Charisma extends AbstractIntegerProperty implements BaseProperty
{
    const CHARISMA = PropertyCode::CHARISMA;

    /**
     * @return string
     */
    public function getCode()
    {
        return self::CHARISMA;
    }

}