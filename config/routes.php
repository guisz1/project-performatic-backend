<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

use Application\Http\Controller\Exchange\ExchangeController;
use Application\Http\Controller\Account\AccountController;
use Application\Http\Middleware\AuthMiddleware;
use Hyperf\HttpServer\Router\Router;

Router::addGroup('/api', function () {
    Router::addGroup('/account', function () {
        Router::addRoute(['POST'], '/create', [AccountController::class, 'create']);
    });
    Router::addGroup('/auth', function () {
        Router::addRoute(['GET'], '/me', [AccountController::class, 'me']);
    }, ['middleware' => [AuthMiddleware::class]]);
    Router::addGroup('/exchange', function () {
        Router::addRoute(['POST'], '/deposit', [ExchangeController::class, 'deposit']);
        Router::addRoute(['POST'], '/transfer', [ExchangeController::class, 'transfer']);
        Router::addRoute(['POST'], '/withdraw', [AccountController::class, 'create']);
    }, ['middleware' => [AuthMiddleware::class]]);
    
});
