<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * Member input parameters.
 */
class MemberInput implements \JsonSerializable, JsonUnserializable
{
    /**
     * The identifier of the user.
     */
    public null|string $userId;

    /**
     * The identifier of the role.
     *
     * This is currently limited to `member`, `admin`, and `owner`.
     */
    public null|string $roleId;

    public function __construct(
        null|string $userId = null,
        null|string $roleId = null,
    ) {
        $this->userId = $userId ?? null;
        $this->roleId = $roleId ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'userId' => isset($this->userId) ? $this->userId : null,
            'roleId' => isset($this->roleId) ? $this->roleId : null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!is_object($data)) {
            throw new TypeError('json data must be an object');
        }

        return new MemberInput(
            isset($data->{'userId'}) ? $data->{'userId'} : null,
            isset($data->{'roleId'}) ? $data->{'roleId'} : null,
        );
    }
}
