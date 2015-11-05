<?php
namespace DrdPlus\Properties;

/**
 * @method static PropertyInterface getIt($value)
 */
interface PropertyInterface
{

    /**
     * @return string
     */
    public function getCode();

    public function getValue();
}
