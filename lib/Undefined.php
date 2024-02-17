<?php

declare(strict_types=1);

namespace UserHub;

class Undefined
{
    public static function is(mixed $v): bool
    {
        return $v instanceof self;
    }
}
