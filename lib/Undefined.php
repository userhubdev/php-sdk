<?php

declare(strict_types=1);

namespace UserHub;

/**
 * @internal
 */
final class Undefined
{
    public static function is(mixed $v): bool
    {
        return $v instanceof self;
    }
}
