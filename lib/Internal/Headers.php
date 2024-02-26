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
 *
 * @implements \IteratorAggregate<string|array<string>>
 * @implements \ArrayAccess<string, string|array<string>>
 */
final class Headers implements \ArrayAccess, \Countable, \IteratorAggregate
{
    /** @var array<string, array<string>|string> */
    private array $container;

    /**
     * @param array<string, array<string>|string> $initial_array
     */
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
     * @return \ArrayIterator<string,array<string>|string>
     */
    #[\ReturnTypeWillChange]
    public function getIterator()
    {
        return new \ArrayIterator($this->container);
    }

    /**
     * @param $offset string
     * @param $value  string|array<string>
     */
    #[\ReturnTypeWillChange]
    public function offsetSet($offset, $value): void
    {
        if (\is_string($offset)) {
            $offset = strtolower($offset);
            $this->container[$offset] = $value;
        }
    }

    /**
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function offsetExists($offset)
    {
        $offset = strtolower($offset);

        return isset($this->container[$offset]);
    }

    #[\ReturnTypeWillChange]
    public function offsetUnset($offset): void
    {
        $offset = strtolower($offset);
        unset($this->container[$offset]);
    }

    /**
     * @return null|array<string>|string
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        $offset = strtolower($offset);

        return $this->container[$offset] ?? null;
    }

    public function get(string $name): string
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

    /**
     * @return array<string>
     */
    public function getAll(string $name): array
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

    /**
     * @return array<string, string>
     */
    public function array(): array
    {
        $headers = [];

        foreach ($this as $name => $value) {
            if (\is_string($value) && !empty($v)) {
                $headers[$name] = $value;
            } elseif (\is_array($value)) {
                foreach ($value as $v) {
                    if (!empty($v) && \is_string($v)) {
                        $headers[$name] = $v;
                    }
                }
            }
        }

        return $headers;
    }
}
