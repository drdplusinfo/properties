<?php
namespace DrdPlus\Properties;

use Granam\Scalar\ScalarInterface;

interface Property extends ScalarInterface
{

    /**
     * @return string
     */
    public function getCode();

    /**
     * @return int|float|bool|string
     */
    public function getValue();
}