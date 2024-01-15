<?php

declare(strict_types=1);

use Application\Listener\ExchangeRegisteredListener;

/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
return [
    Hyperf\ExceptionHandler\Listener\ErrorExceptionHandler::class,
    Hyperf\Command\Listener\FailToHandleListener::class,
    ExchangeRegisteredListener::class,
];
