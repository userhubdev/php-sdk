<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub\AdminV1;

use UserHub\Internal\JsonUnserializable;

/**
 * The signup flow.
 */
final class SignupFlow implements \JsonSerializable, JsonUnserializable
{
    /**
     * The email address of the invitee.
     */
    public string $email;

    /**
     * The display name of the invitee.
     */
    public ?string $displayName;

    /**
     * Whether to create an organization as part of the signup flow.
     */
    public ?bool $createOrganization;

    public function __construct(
        ?string $email = null,
        ?string $displayName = null,
        ?bool $createOrganization = null,
    ) {
        $this->email = $email ?? '';
        $this->displayName = $displayName ?? null;
        $this->createOrganization = $createOrganization ?? null;
    }

    public function jsonSerialize(): mixed
    {
        return (object) [
            'email' => $this->email ?? null,
            'displayName' => $this->displayName ?? null,
            'createOrganization' => $this->createOrganization ?? null,
        ];
    }

    public static function jsonUnserialize(mixed $data): static
    {
        if (!\is_object($data)) {
            throw new \TypeError('json data must be an object');
        }

        return new self(
            $data->{'email'} ?? null,
            $data->{'displayName'} ?? null,
            $data->{'createOrganization'} ?? null,
        );
    }
}
