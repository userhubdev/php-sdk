<?php

// Code generated. DO NOT EDIT.

namespace UserHub\UserV1;

use UserHub\Internal\JsonUnserializable;

/**
 * Organization input parameters.
 */
class OrganizationInput implements \JsonSerializable, JsonUnserializable
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
    public null|string $uniqueId;

    /**
     * The human-readable display name of the organization.
     *
     * The maximum length is 200 characters.
     */
    public null|string $displayName;

    /**
     * The email address of the organization.
     *
     * The maximum length is 320 characters.
     */
    public null|string $email;

    /**
     * The flow identifier associated with the creation of the organization.
     *
     * The flow type must be `SIGNUP` and associated with the user creating the organization.
     */
    public null|string $flowId;

    public function __construct(
        null|string $uniqueId = null,
        null|string $displayName = null,
        null|string $email = null,
        null|string $flowId = null,
    ) {
        $this->uniqueId = $uniqueId ?? null;
        $this->displayName = $displayName ?? null;
        $this->email = $email ?? null;
        $this->flowId = $flowId ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'uniqueId' => isset($this->uniqueId) ? $this->uniqueId : null,
            'displayName' => isset($this->displayName) ? $this->displayName : null,
            'email' => isset($this->email) ? $this->email : null,
            'flowId' => isset($this->flowId) ? $this->flowId : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new OrganizationInput(
            isset($data->{'uniqueId'}) ? $data->{'uniqueId'} : null,
            isset($data->{'displayName'}) ? $data->{'displayName'} : null,
            isset($data->{'email'}) ? $data->{'email'} : null,
            isset($data->{'flowId'}) ? $data->{'flowId'} : null,
        );
    }
}
