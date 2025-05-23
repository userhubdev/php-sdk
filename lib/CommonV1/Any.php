<?php

declare(strict_types=1);

namespace UserHub\CommonV1;

use UserHub\Internal\JsonUnserializable;

/**
 * Contains an arbitrary serialized message along with a @var that describes the type of the serialized message.
 */
final class Any implements \JsonSerializable, JsonUnserializable
{
    /**
     * The type of the serialized message.
     */
    public ?string $objectType;

    public function __construct(
        ?string $objectType = null,
    ) {
        $this->objectType = $objectType ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            '@type' => $this->objectType ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'@type'} ?? null,
        );
    }
}
