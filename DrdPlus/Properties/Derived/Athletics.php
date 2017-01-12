<?php
namespace DrdPlus\Properties\Derived;

use Granam\Integer\PositiveInteger;

/**
 * Just an interface to cover requirements. It is not implemented int this library.
 */
interface Athletics
{
    /**
     * @return PositiveInteger
     */
    public function getAthleticsBonus();
}