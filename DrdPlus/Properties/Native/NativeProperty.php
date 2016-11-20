<?php
namespace DrdPlus\Properties\Native;

use Doctrineum\Boolean\BooleanEnum;
use DrdPlus\Properties\Partials\WithHistoryTrait;
use DrdPlus\Properties\Property;
use Granam\Boolean\BooleanInterface;

/** @noinspection SingletonFactoryPatternViolationInspection */
abstract class NativeProperty extends BooleanEnum implements Property
{
    use WithHistoryTrait;

    /**
     * @param bool $value
     * @return NativeProperty
     * @throws \Doctrineum\Boolean\Exceptions\UnexpectedValueToConvert
     */
    public static function getIt($value)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return new static($value);
    }

    /**
     * @param bool|BooleanInterface $enumValue
     * @throws \Doctrineum\Scalar\Exceptions\UnexpectedValueToEnum
     */
    protected function __construct($enumValue)
    {
        parent::__construct($enumValue);
        $this->noticeChange();
    }
}