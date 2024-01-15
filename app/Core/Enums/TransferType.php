<?php

declare(strict_types=1);

namespace Core\Enums;

enum TransferType: string
{
    case Withdraw = 'withdraw';
    case Deposit = 'deposit';
    case Transfer = 'transfer';
}
