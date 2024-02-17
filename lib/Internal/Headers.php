<?php

declare(strict_types=1);

// The MIT License
//
// Copyright (c) 2010-2019 Stripe, Inc. (https://stripe.com)
//
// Permission is hereby granted, free of charge, to any person obtaining a copy
// of this software and associated documentation files (the "Software"), to deal
// in the Software without restriction, including without limitation the rights
// to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
// copies of the Software, and to permit persons to whom the Software is
// furnished to do so, subject to the following conditions:
//
// The above copyright notice and this permission notice shall be included in
// all copies or substantial portions of the Software.
//
// THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
// IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
// FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
// AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
// LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
// OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
// THE SOFTWARE.

namespace UserHub\Internal;

/**
 * @internal
 *
 * Headers is an array-like class that ignores case for keys.
 *
 * It is used to store HTTP headers. Per RFC 2616, section 4.2:
 * Each header field consists of a name followed by a colon (":") and the field value. Field names
 * are case-insensitive.
 */
final class Headers implements \ArrayAccess, \Countable, \IteratorAggregate
{
    private array $container;

    public function __construct(array $initial_array = [])
    {
        $this->container = array_change_key_case($initial_array, CASE_LOWER);
    }

    /**
     * @return int
     */
    #[\ReturnTypeWillChange]
    public function count()
    {
        return \count($this->container);
    }

    /**
     * @return \ArrayIterator
     */
    #[\ReturnTypeWillChange]
    public function getIterator()
    {
        return new \ArrayIterator($this->container);
    }

    #[\ReturnTypeWillChange]
    public function offsetSet($offset, $value): void
    {
        $offset = self::maybeLowercase($offset);
        if (null === $offset) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function offsetExists($offset)
    {
        $offset = self::maybeLowercase($offset);

        return isset($this->container[$offset]);
    }

    #[\ReturnTypeWillChange]
    public function offsetUnset($offset): void
    {
        $offset = self::maybeLowercase($offset);
        unset($this->container[$offset]);
    }

    /**
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        $offset = self::maybeLowercase($offset);

        return $this->container[$offset] ?? null;
    }

    public function get($name): string
    {
        $value = self::offsetGet($name);

        if (\is_string($value)) {
            return $value;
        }

        if (\is_array($value)) {
            foreach ($value as $v) {
                if (\is_string($v)) {
                    return $v;
                }
            }
        }

        return '';
    }

    public function getAll($name): array
    {
        $value = self::offsetGet($name);

        $headers = [];

        if (!empty($value)) {
            if (\is_string($value)) {
                $headers[] = $value;
            } elseif (\is_array($value)) {
                foreach ($value as $v) {
                    if (!empty($v) && \is_string($v)) {
                        $headers[] = $v;
                    }
                }
            }
        }

        return $headers;
    }

    private static function maybeLowercase($v)
    {
        if (\is_string($v)) {
            return strtolower($v);
        }

        return $v;
    }
}