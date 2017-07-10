<?php
namespace DrdPlus\Properties\Derived;

use Granam\Integer\PositiveInteger;

/**
 * Just an interface to cover requirements. It is not implemented in this library.
 */
interface Athletics
{
    /**
     * @return PositiveInteger
     */
    public function getAthleticsBonus(): PositiveInteger;
}