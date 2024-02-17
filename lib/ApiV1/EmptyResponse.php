<?php

declare(strict_types=1);

namespace UserHub\ApiV1;

use UserHub\Internal\JsonUnserializable;

/**
 * Empty response.
 */
class EmptyResponse implements \JsonSerializable, JsonUnserializable
{
    public function __construct() {}

    public function jsonSerialize(): mixed
    {
        return (object) [];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        return new self();
    }
}
