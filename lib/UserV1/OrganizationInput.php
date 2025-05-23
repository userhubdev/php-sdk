<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * Organization input parameters.
 */
final class OrganizationInput implements \JsonSerializable, JsonUnserializable
{
    /**
     * The client defined unique identifier of the organization account.
     *
     * It is restricted to letters, numbers, underscores, and hyphens,
     * with the first character a letter or a number, and a 255
     * character maximum.
     *
     * ID's starting with `org_` are reserved.
     */
    public ?string $uniqueId;

    /**
     * The human-readable display name of the organization.
     *
     * The maximum length is 200 characters.
     */
    public ?string $displayName;

    /**
     * The email address of the organization.
     *
     * The maximum length is 320 characters.
     */
    public ?string $email;

    /**
     * The flow identifier associated with the creation of the organization.
     *
     * The flow type must be `SIGNUP` and associated with the user creating the organization.
     */
    public ?string $flowId;

    public function __construct(
        ?string $uniqueId = null,
        ?string $displayName = null,
        ?string $email = null,
        ?string $flowId = null,
    ) {
        $this->uniqueId = $uniqueId ?? null;
        $this->displayName = $displayName ?? null;
        $this->email = $email ?? null;
        $this->flowId = $flowId ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'uniqueId' => $this->uniqueId,
            'displayName' => $this->displayName,
            'email' => $this->email,
            'flowId' => $this->flowId,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'uniqueId'} ?? null,
            $data->{'displayName'} ?? null,
            $data->{'email'} ?? null,
            $data->{'flowId'} ?? null,
        );
    }
}
