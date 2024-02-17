<?php

declare(strict_types=1);

namespace UserHub;

enum Code: string
{
    case OK = 'OK';
    case Canceled = 'CANCELLED';
    case Unknown = 'UNKNOWN';
    case InvalidArgument = 'INVALID_ARGUMENT';
    case DeadlineExceeded = 'DEADLINE_EXCEEDED';
    case NotFound = 'NOT_FOUND';
    case AlreadyExists = 'ALREADY_EXISTS';
    case PermissionDenied = 'PERMISSION_DENIED';
    case Unauthenticated = 'UNAUTHENTICATED';
    case ResourceExhausted = 'RESOURCE_EXHAUSTED';
    case FailedPrecondition = 'FAILED_PRECONDITION';
    case Aborted = 'ABORTED';
    case OutOfRange = 'OUT_OF_RANGE';
    case Unimplemented = 'UNIMPLEMENTED';
    case Internal = 'INTERNAL';
    case Unavailable = 'UNAVAILABLE';
    case DataLoss = 'DATA_LOSS';

    public function webhookStatusCode(): int
    {
        return match ($this) {
            Code::OK => 200,
            Code::AlreadyExists, Code::FailedPrecondition, Code::InvalidArgument => 400,
            Code::NotFound => 404,
            Code::ResourceExhausted => 429,
            Code::Unimplemented => 501,
            default => 500,
        };
    }
}
