<?php

declare(strict_types=1);

namespace Application\Http\Resource;

use Application\Constants\ErrorCode;
use Application\Exception\BusinessException;
use Hyperf\Resource\Json\JsonResource;
use Hyperf\Resource\Response\Response;
use Psr\Http\Message\ResponseInterface;
use Teapot\StatusCode\Http;

class ErrorResource extends JsonResource
{
    /** @var BusinessException */
    public mixed $resource;
    public ?string $wrap = null;

    public function toArray(): array
    {
        $code    = $this->resource->getCode();
        $message = ErrorCode::getMessage($code);

        return [
            'code'    => $code,
            'message' => $message,
        ];
    }

    public function toResponse(): ResponseInterface
    {
        if ($this->resource->getCode() == ErrorCode::NOT_FOUND) {
            return (new NotFoundResource($this->resource))->toResponse();
        }

        $status = match ($this->resource->getCode()) {
            ErrorCode::BAD_REQUEST => Http::BAD_REQUEST,
            ErrorCode::UNAUTHORIZED => Http::UNAUTHORIZED,
            ErrorCode::FORBIDDEN => Http::FORBIDDEN,
            ErrorCode::INVALID_PASSWORD => Http::FORBIDDEN,
            ErrorCode::ACCOUNT_AMOUNT_NOT_VALID => Http::BAD_REQUEST,
            ErrorCode::ACCOUNT_EXCHANGE_NOT_VALIDATED => Http::BAD_REQUEST,
            ErrorCode::ACCOUNT_TYPE_NOT_ALLOWED => Http::BAD_REQUEST,
            default => Http::INTERNAL_SERVER_ERROR,
        };

        return (new Response($this))
            ->toResponse()
            ->withStatus($status);
    }
}
