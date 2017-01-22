<?php
namespace DrdPlus\Properties;

use DrdPlus\Codes\Properties\PropertyCode;
use Granam\Scalar\ScalarInterface;

interface Property extends ScalarInterface
{

    /**
     * @return PropertyCode
     */
    public function getCode();

    /**
     * @return int|float|bool|string
     */
    public function getValue();
}