<?php

declare(strict_types=1);

namespace UserHub\Internal;

/**
 * @internal
 */
abstract class Util
{
    public static function emptyDateTime(): \DateTimeImmutable
    {
        // @phpstan-ignore-next-line
        return \DateTimeImmutable::createFromFormat('U', '0', new \DateTimeZone('UTC'));
    }

    public static function decodeDateTime(?string $value): ?\DateTimeInterface
    {
        if (!\is_string($value) || '' === $value) {
            return null;
        }
        $datetime = \DateTimeImmutable::createFromFormat('Y-m-d\TH:i:s.uP', $value);

        return false !== $datetime ? $datetime : null;
    }

    public static function encodeDateTime(?\DateTimeInterface $value): ?string
    {
        if (!isset($value)) {
            return null;
        }

        $formatted = $value->format('Y-m-d\TH:i:s.uP');
        if (str_ends_with($formatted, '+00:00')) {
            $formatted = substr($formatted, 0, -6).'Z';
        }

        return $formatted;
    }

    /**
     * @template T
     *
     * @param callable(mixed): T $callback
     *
     * @return array<string, T>
     */
    public static function mapObject(?object $value, callable $callback): array
    {
        $output = [];

        if (is_iterable($value)) {
            foreach ($value as $k => $v) {
                $output->{$k} = \call_user_func($callback, $v);
            }
        }

        return $output;
    }

    /**
     * @template T
     *
     * @param null|array<mixed>  $value
     * @param callable(mixed): T $callback
     *
     * @return array<T>
     */
    public static function mapArray(?array $value, callable $callback): array
    {
        if (!\is_array($value)) {
            return [];
        }

        return array_map($callback, $value);
    }

    public static function summarizeBody(?string $body): string
    {
        if (empty($body)) {
            return '';
        }
        $body = preg_replace('/\s+/', ' ', $body);
        if (!\is_string($body)) {
            return '';
        }
        $body = trim($body);
        if (empty($body)) {
            return '';
        }
        $body = substr($body, 0, Constants::SUMMARIZE_BODY_LENGTH * 2);

        return ': '.$body.'...';
    }
}
