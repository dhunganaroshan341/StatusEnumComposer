<?php

namespace RoshanDhungana\Status\Traits;

use RoshanDhungana\Status\Rules\EnumRule;

trait HasEnumHelpers
{
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function options(): array
    {
        $options = [];

        foreach (self::cases() as $case) {
            $options[$case->value] = static::labelFromCase($case);
        }

        return $options;
    }

    public static function optionsWithMeta(): array
    {
        $options = [];

        foreach (self::cases() as $case) {
            $options[$case->value] = [
                'label' => static::labelFromCase($case),
            ];
        }

        return $options;
    }

    public static function rule(): EnumRule
    {
        return new EnumRule(static::class);
    }

    public function label(): string
    {
        return static::options()[$this->value] ?? $this->value;
    }

    public function is(string|self $value): bool
    {
        if ($value instanceof self) {
            return $this === $value;
        }

        return $this->value === $value;
    }

    public static function fromValue(string $value): ?self
    {
        foreach (self::cases() as $case) {
            if ($case->value === $value) {
                return $case;
            }
        }

        return null;
    }

    protected static function labelFromCase($case): string
    {
        return ucfirst(strtolower(str_replace('_', ' ', $case->name)));
    }
}