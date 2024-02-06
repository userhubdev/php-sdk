<?php

namespace UserHub\Internal;

abstract class Util
{
    public static function emptyDateTime(): ?\DateTimeInterface
    {
        return \DateTimeImmutable::createFromFormat('U', '0', new \DateTimeZone('UTC'));
    }

    public static function decodeDateTime(?string $value): ?\DateTimeInterface
    {
        if (!\is_string($value) || '' === $value) {
            return null;
        }
        $datetime = \DateTimeImmutable::createFromFormat('Y-m-d\\TH:i:s.uP', $value);

        return false !== $datetime ? $datetime : null;
    }

    public static function encodeDateTime(?\DateTimeInterface $value): ?string
    {
        if (!isset($value)) {
            return null;
        }
        if (!$value instanceof \DateTimeInterface) {
            throw new \TypeError('value must be a DateTimeInterface');
        }
        $formatted = $value->format('Y-m-d\\TH:i:s.uP');
        if (str_ends_with($formatted, '+00:00')) {
            $formatted = substr($formatted, 0, -6).'Z';
        }

        return $formatted;
    }

    public static function mapObject(?object $value, callable $callback): object
    {
        $output = (object) [];

        if (\is_object($value)) {
            foreach ($value as $k => $v) {
                $output->{$k} = \call_user_func($callback, $v);
            }
        }

        return $output;
    }

    public static function mapArray(?array $value, callable $callback): array
    {
        if (!\is_array($value)) {
            return [];
        }

        return array_map($callback, $value);
    }
}
