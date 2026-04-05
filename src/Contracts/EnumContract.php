<?php

namespace RoshanDhungana\Status\Contracts;

interface EnumContract
{
    public static function values(): array;

    public static function options(): array;

    public static function rule(): object;

    public function label(): string;

    public function is(string|self $value): bool;
}