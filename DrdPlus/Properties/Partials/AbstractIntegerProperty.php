<?php
namespace DrdPlus\Properties\Partials;

use Doctrineum\Integer\IntegerEnum;
use DrdPlus\Properties\Property;
use Granam\Integer\IntegerInterface;
use Granam\Integer\Tools\ToInteger;

abstract class AbstractIntegerProperty extends IntegerEnum implements Property
{

    use NumberWithHistoryTrait;

    /**
     * Will give clone.
     *
     * @param int $value
     * @return IntegerEnum|AbstractIntegerProperty
     */
    public static function getIt($value)
    {
        return static::getEnum($value);
    }

    /**
     * Will give clone.
     *
     * @param int $enumValue
     * @return IntegerEnum|AbstractIntegerProperty
     */
    public static function getEnum($enumValue)
    {
        /** @var AbstractIntegerProperty $integerProperty */
        $integerProperty = clone parent::getEnum($enumValue); // cloned to get unique history
        $integerProperty->noticeChange();

        return $integerProperty;
    }

    public function __clone()
    {
        // overloaded parent to allow cloning (to get clean property WITHOUT history)
    }

    /**
     * @param int|IntegerInterface $value
     * @return AbstractIntegerProperty
     * @throws \Granam\Integer\Tools\Exceptions\WrongParameterType
     * @throws \Granam\Integer\Tools\Exceptions\ValueLostOnCast
     */
    public function add($value)
    {
        $increased = static::getIt($this->getValue() + ToInteger::toInteger($value));
        $increased->adoptHistory($this);

        return $increased;
    }

    /**
     * @param int|IntegerInterface $value
     * @return AbstractIntegerProperty
     * @throws \Granam\Integer\Tools\Exceptions\WrongParameterType
     * @throws \Granam\Integer\Tools\Exceptions\ValueLostOnCast
     */
    public function sub($value)
    {
        $decreased = static::getIt($this->getValue() - ToInteger::toInteger($value));
        $decreased->adoptHistory($this);

        return $decreased;
    }
}