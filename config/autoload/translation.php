<?php

declare(strict_types=1);

use Core\Helper\Util;

/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
return [
    'locale' => Util::DEFAULT_LOCALE,
    'fallback_locale' => 'en',
    'path' => BASE_PATH . '/storage/languages',
];
