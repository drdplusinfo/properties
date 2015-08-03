<?php
namespace DrdPlus\Properties;

use Doctrineum\Strict\String\StrictStringEnum;

abstract class AbstractStringProperty extends StrictStringEnum implements PropertyInterface
{

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->getEnumValue();
    }

}
