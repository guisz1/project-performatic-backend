<?php

declare(strict_types=1);

namespace Core\Enums;

enum UserRole: string
{
    case Market = 'market';
    case Commom = 'commom';
}
