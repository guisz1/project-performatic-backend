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
return [

    // -----------------------------------------------------------------------
    // Repositories
    Core\Repositories\AccountRepository::class => Infrastructure\Repositories\AccountDatabaseRepository::class,
    Core\Repositories\ExchangeRepository::class => Infrastructure\Repositories\ExchangeDatabaseRepository::class,

];
