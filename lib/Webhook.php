<?php

// Code generated. DO NOT EDIT.

declare(strict_types=1);

namespace UserHub;

use UserHub\ConnectionsV1\Challenge;
use UserHub\ConnectionsV1\CustomUser;
use UserHub\ConnectionsV1\DeleteCustomUserRequest;
use UserHub\ConnectionsV1\GetCustomUserRequest;
use UserHub\ConnectionsV1\ListCustomUsersRequest;
use UserHub\EventsV1\Event;
use UserHub\Webhook\BaseWebhook;
use UserHub\Webhook\DecodeHandler;

/**
 * @param string                          $signingSecret
 * @param null|callable(\Exception): void $onError
 */
class Webhook extends BaseWebhook
{
    /**
     * Registers a handler for the `challenge` action.
     *
     * @param null|callable(\UserHub\ConnectionsV1\Challenge): \UserHub\ConnectionsV1\Challenge $handler is the action handler
     */
    public function onChallenge(null|callable $handler): self
    {
        if (isset($handler)) {
            $handler = new DecodeHandler($handler, Challenge::jsonUnserialize(...));
        }

        return $this->onAction('challenge', $handler);
    }

    /**
     * Registers a handler for the `events.handle` action.
     *
     * @param null|callable(\UserHub\EventsV1\Event): void $handler is the action handler
     */
    public function onEvent(null|callable $handler): self
    {
        if (isset($handler)) {
            $handler = new DecodeHandler($handler, Event::jsonUnserialize(...));
        }

        return $this->onAction('events.handle', $handler);
    }

    /**
     * Registers a handler for the `users.list` action.
     *
     * @param null|callable(\UserHub\ConnectionsV1\ListCustomUsersRequest): \UserHub\ConnectionsV1\ListCustomUsersResponse $handler is the action handler
     */
    public function onListUsers(null|callable $handler): self
    {
        if (isset($handler)) {
            $handler = new DecodeHandler($handler, ListCustomUsersRequest::jsonUnserialize(...));
        }

        return $this->onAction('users.list', $handler);
    }

    /**
     * Registers a handler for the `users.create` action.
     *
     * @param null|callable(\UserHub\ConnectionsV1\CustomUser): \UserHub\ConnectionsV1\CustomUser $handler is the action handler
     */
    public function onCreateUser(null|callable $handler): self
    {
        if (isset($handler)) {
            $handler = new DecodeHandler($handler, CustomUser::jsonUnserialize(...));
        }

        return $this->onAction('users.create', $handler);
    }

    /**
     * Registers a handler for the `users.get` action.
     *
     * @param null|callable(\UserHub\ConnectionsV1\GetCustomUserRequest): \UserHub\ConnectionsV1\CustomUser $handler is the action handler
     */
    public function onGetUser(null|callable $handler): self
    {
        if (isset($handler)) {
            $handler = new DecodeHandler($handler, GetCustomUserRequest::jsonUnserialize(...));
        }

        return $this->onAction('users.get', $handler);
    }

    /**
     * Registers a handler for the `users.update` action.
     *
     * @param null|callable(\UserHub\ConnectionsV1\CustomUser): \UserHub\ConnectionsV1\CustomUser $handler is the action handler
     */
    public function onUpdateUser(null|callable $handler): self
    {
        if (isset($handler)) {
            $handler = new DecodeHandler($handler, CustomUser::jsonUnserialize(...));
        }

        return $this->onAction('users.update', $handler);
    }

    /**
     * Registers a handler for the `users.delete` action.
     *
     * @param null|callable(\UserHub\ConnectionsV1\DeleteCustomUserRequest): void $handler is the action handler
     */
    public function onDeleteUser(null|callable $handler): self
    {
        if (isset($handler)) {
            $handler = new DecodeHandler($handler, DeleteCustomUserRequest::jsonUnserialize(...));
        }

        return $this->onAction('users.delete', $handler);
    }
}
