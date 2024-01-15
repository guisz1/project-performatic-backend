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
    'generator' => [
        'command' => [
            'namespace' => 'Application\\Command',
        ],
        'job' => [
            'namespace' => 'Application\\Job',
        ],
        'listener' => [
            'namespace' => 'Application\\Listener',
        ],
        'controller' => [
            'namespace' => 'Application\\Http\\Controller',
        ],
        'middleware' => [
            'namespace' => 'Application\\Http\\Middleware',
        ],
        'request' => [
            'namespace' => 'Application\\Http\\Request',
        ],
        'resource' => [
            'namespace' => 'Application\\Http\\Resource',
        ],
        
    ],
];
