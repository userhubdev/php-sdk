<?php

declare(strict_types=1);

namespace UserHub\Internal;

/**
 * @internal
 */
interface JsonUnserializable
{
    public static function jsonUnserialize(mixed $data): static;
}
