<?php
namespace DrdPlus\Properties\EnumTypes;

trait EnumClassTrait
{

    /**
     * @param float|int|null|string $enumValue
     *
     * @return string
     */
    protected static function getEnumClass($enumValue)
    {
        /** @noinspection PhpUndefinedClassInspection */
        /** @noinspection PhpUndefinedMethodInspection */
        $enumClass = parent::getEnumClass($enumValue);

        $enumClass = preg_replace('~\\\(\w+)\\\(\w+)$~', '\\\$2', $enumClass); // Removing type namespace tail because of enum namespace

        return $enumClass;
    }
}
