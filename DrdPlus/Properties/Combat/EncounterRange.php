<?php
namespace DrdPlus\Properties\Combat;

use DrdPlus\Properties\Combat\Partials\AbstractRange;

/**
 * @method EncounterRange add(int | IntegerInterface $value)
 * @method EncounterRange sub(int | IntegerInterface $value)
 */
class EncounterRange extends AbstractRange
{
    /**
     * @param $value
     * @throws \Granam\Integer\Tools\Exceptions\WrongParameterType
     * @throws \Granam\Integer\Tools\Exceptions\ValueLostOnCast
     */
    public function __construct($value)
    {
        parent::__construct($value);
    }
}