<?php

namespace RoshanDhungana\Status\Enums;

use RoshanDhungana\Status\Contracts\EnumContract;
use RoshanDhungana\Status\Traits\HasEnumHelpers;

enum Status: string implements EnumContract
{
    use HasEnumHelpers;

    case ACTIVE = 'active';
    case INACTIVE = 'inactive';

    public function isActive(): bool
    {
        return $this->is(self::ACTIVE);
    }

    public function isInactive(): bool
    {
        return $this->is(self::INACTIVE);
    }
}