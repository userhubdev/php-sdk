<?php

namespace UserHub\Internal;

interface JsonUnserializable
{
    public static function jsonUnserialize(mixed $data): static;
}
