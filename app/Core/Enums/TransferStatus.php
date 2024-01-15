<?php

declare(strict_types=1);

namespace Core\Enums;

enum TransferStatus: string
{
    case Await = 'await';
    case Failed = 'failed';
    case Success = 'success';
}
