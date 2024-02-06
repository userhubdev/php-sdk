<?php

// Code generated. DO NOT EDIT.

namespace UserHub\UserApi;

use UserHub\Internal\Transport;

/**
 * The User API.
 *
 * @property Flows    $flows
 * @property Invoices $invoices
 * @property Session  $session
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

            case 'session':
                return new Session($this->transport);

            default:
                \trigger_error('Undefined property: '.static::class.'::$'.$name);

                return null;
        }
    }
}
