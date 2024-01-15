<?php

declare(strict_types=1);

namespace Application\Http\Middleware;

use App\Model\User;
use Application\Constants\ErrorCode;
use Application\Exception\BusinessException;
use Core\Helper\Util;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

// TO - DO implementar um melho metodo de autenticação como OAuth ou Bearer Token

class AuthMiddleware implements MiddlewareInterface
{
    private const HEADER = 'Authorization';

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        if (!$request->getHeader(self::HEADER)) {
            throw new BusinessException(ErrorCode::UNAUTHORIZED);
        }

        $credentials = $this->basicAuth($request->getHeader(self::HEADER));

        if (empty($credentials)) {
            throw new BusinessException(ErrorCode::FORBIDDEN);
        }

        $user = User::query()->where('document', $credentials['document'])->first();

        if (!$user) {
            throw new BusinessException(ErrorCode::UNAUTHORIZED);
        }

        if (!password_verify($credentials['password'], $user->password) && $user->active) {
            throw new BusinessException(ErrorCode::INVALID_PASSWORD);
        }

        return $handler->handle(
            $request->withAttribute('document', $user->document)
        );
    }

    private function basicAuth(array $authorization): array
    {

        if (!str_contains($authorization[0], 'Basic ')) {
            return [];
        };

        $credentials = [];

        $token = base64_decode(str_replace('Basic ', '', $authorization[0]));

        $explodedToken = explode(':', $token, 2);
        $credentials['document'] = Util::unmask($explodedToken[0]);
        $credentials['password'] = $explodedToken[1];
        return $credentials;

    }
    
}
