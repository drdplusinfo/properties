<?php
namespace DrdPlus\Properties\Restrictions\EnumTypes;

use Doctrineum\Boolean\BooleanEnumType;
use DrdPlus\Codes\Properties\PropertyCode;

class RequiresDmAgreementType extends BooleanEnumType
{
    const REQUIRES_DM_AGREEMENT = PropertyCode::REQUIRES_DM_AGREEMENT;

    /**
     * @return string
     */
    public function getName()
    {
        return self::REQUIRES_DM_AGREEMENT;
    }
}