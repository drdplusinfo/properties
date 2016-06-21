<?php
namespace DrdPlus\Properties\Restrictions;

use Doctrineum\Boolean\BooleanEnum;
use DrdPlus\Codes\PropertyCode;

class RequiresDmAgreement extends BooleanEnum implements RestrictionProperty
{
    const REQUIRES_DM_AGREEMENT = PropertyCode::REQUIRES_DM_AGREEMENT;

    /**
     * @param bool $value
     * @return static
     */
    public static function getIt($value)
    {
        return new static($value);
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return self::REQUIRES_DM_AGREEMENT;
    }

}
