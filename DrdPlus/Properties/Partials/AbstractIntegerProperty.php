<?php
namespace DrdPlus\Properties\Partials;

use Doctrineum\Integer\IntegerEnum;
use DrdPlus\Properties\Property;
use Granam\Integer\IntegerInterface;
use Granam\Integer\Tools\ToInteger;

abstract class AbstractIntegerProperty extends IntegerEnum implements Property
{

    use WithHistoryTrait;

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

    /**
     * History will be cleaned - use @see WithHistoryTrait::adoptHistory internally to follow parent history.
     */
    public function __clone()
    {
        // overloaded parent to allow cloning (to get clean property WITHOUT history)
        $this->history = []; // clear history, because it should be simply new property, just of same class and value
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
        $increased->adoptHistory($this); // prepends history of predecessor

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
        $decreased->adoptHistory($this); // prepends history of predecessor

        return $decreased;
    }
}