<?php

namespace RoshanDhungana\Status\Rules;

use Illuminate\Contracts\Validation\Rule;

class EnumRule implements Rule
{
    protected string $enumClass;

    public function __construct(string $enumClass)
    {
        $this->enumClass = $enumClass;
    }

    public function passes($attribute, $value): bool
    {
        return in_array($value, $this->enumClass::values(), true);
    }

    public function message(): string
    {
        return 'The selected value is invalid.';
    }
}