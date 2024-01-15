<?php

declare(strict_types=1);

namespace Application\Exception\Handler;

use Application\Constants\Env;
use Application\Exception\VolumeNotBeepableException;
use Application\Http\Resource\ErrorResource;
use Application\Http\Resource\NotFoundResource;
use Application\Http\Resource\ValidationResource;
use Application\Http\Resource\VolumeNotBeepableResource;
use Hyperf\Contract\StdoutLoggerInterface;
use Hyperf\Database\Model\ModelNotFoundException;
use Hyperf\ExceptionHandler\ExceptionHandler;
use Hyperf\Validation\ValidationException;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class AppExceptionHandler extends ExceptionHandler
{
    public function __construct(
        protected StdoutLoggerInterface $logger
    ) {
    }

    public function handle(Throwable $throwable, ResponseInterface $response)
    {
        $this->logger->error(sprintf('%s[%s] in %s', $throwable->getMessage(), $throwable->getLine(), $throwable->getFile()));

        if ($throwable instanceof ValidationException) {
            return (new ValidationResource($throwable))->toResponse();
        }

        return (new ErrorResource($throwable))->toResponse();
    }

    public function isValid(Throwable $throwable): bool
    {
        return true;
    }
}
