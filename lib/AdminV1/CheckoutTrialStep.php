<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The trial step details.
 */
final class CheckoutTrialStep implements \JsonSerializable, JsonUnserializable
{
    /**
     * Whether to start or continue a trial.
     */
    public string $type;

    /**
     * The number of days in the trial.
     */
    public ?int $days;

    public function __construct(
        ?string $type = null,
        ?int $days = null,
    ) {
        $this->type = $type ?? '';
        $this->days = $days ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'type' => $this->type,
            'days' => $this->days,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'type'} ?? null,
            $data->{'days'} ?? null,
        );
    }
}
