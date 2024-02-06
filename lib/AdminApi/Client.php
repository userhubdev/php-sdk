<?php

// Code generated. DO NOT EDIT.

namespace UserHub\AdminApi;

use UserHub\Internal\Transport;

/**
 * The Admin API.
 *
 * @property Flows         $flows
 * @property Invoices      $invoices
 * @property Organizations $organizations
 * @property Subscriptions $subscriptions
 * @property Users         $users
 */
class Client
{
    private Transport $transport;

    public function __construct(Transport $transport)
    {
        $this->transport = $transport;
    }

    public function __get(string $name): mixed
    {
        switch ($name) {
            case 'flows':
                return new Flows($this->transport);

            case 'invoices':
                return new Invoices($this->transport);

            case 'organizations':
                return new Organizations($this->transport);

            case 'subscriptions':
                return new Subscriptions($this->transport);

            case 'users':
                return new Users($this->transport);

            default:
                \trigger_error('Undefined property: '.static::class.'::$'.$name);

                return null;
        }
    }
}
