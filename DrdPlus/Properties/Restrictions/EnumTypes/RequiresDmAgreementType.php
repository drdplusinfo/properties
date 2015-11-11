<?php
namespace DrdPlus\Properties\Restrictions\EnumTypes;

use Doctrineum\Boolean\BooleanEnumType;
use DrdPlus\Properties\Restrictions\RequiresDmAgreement;

class RequiresDmAgreementType extends BooleanEnumType
{
    const REQUIRES_DM_AGREEMENT = RequiresDmAgreement::REQUIRES_DM_AGREEMENT;
}
