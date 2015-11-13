<?php
namespace DrdPlus\Properties\Restrictions;

use Doctrineum\Boolean\BooleanEnum;
use DrdPlus\Codes\PropertyCodes;

class RequiresDmAgreement extends BooleanEnum implements RestrictionProperty
{
    const REQUIRES_DM_AGREEMENT = PropertyCodes::REQUIRES_DM_AGREEMENT;

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
