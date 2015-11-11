<?php
namespace DrdPlus\Properties\Restrictions;

use Doctrineum\Boolean\BooleanEnum;

class RequiresDmAgreement extends BooleanEnum implements RestrictionProperty
{
    const REQUIRES_DM_AGREEMENT = 'requires_dm_agreement';

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
