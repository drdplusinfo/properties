<?php
namespace DrdPlus\Properties\Restrictions;

use Doctrineum\Boolean\BooleanEnum;
use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\Partials\WithHistoryTrait;
use Granam\Boolean\BooleanInterface;

class RequiresDmAgreement extends BooleanEnum implements RestrictionProperty
{
    const REQUIRES_DM_AGREEMENT = PropertyCode::REQUIRES_DM_AGREEMENT;

    use WithHistoryTrait;

    /**
     * @param bool $value
     * @return RequiresDmAgreement
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

    /**
     * @return string
     */
    public function getCode()
    {
        return self::REQUIRES_DM_AGREEMENT;
    }

}