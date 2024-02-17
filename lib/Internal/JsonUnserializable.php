<?php

declare(strict_types=1);

namespace UserHub\Internal;

interface JsonUnserializable
{
    public static function jsonUnserialize(mixed $data): static;
}
