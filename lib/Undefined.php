<?php

namespace UserHub;

class Undefined
{
    public static function is(mixed $v): bool
    {
        return $v instanceof self;
    }
}
