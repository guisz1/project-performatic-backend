<?php

namespace Application\Factory;

use Application\Constants\ErrorCode;
use Application\Exception\BusinessException;

abstract class Exchange
{
    abstract public function getExchange(): ExchangeInterface;

    public function getExchangeDto(): array
    {
        $exchange = $this->getExchange();
        if (!$exchange->verifyAccountType()) {
            throw new BusinessException(ErrorCode::ACCOUNT_TYPE_NOT_ALLOWED);
        }

        if (!$exchange->verifyAmount()) {
            throw new BusinessException(ErrorCode::ACCOUNT_AMOUNT_NOT_VALID);
        }

        if (!$exchange->internalValidation()) {
            throw new BusinessException(ErrorCode::ACCOUNT_EXCHANGE_NOT_VALIDATED);
        }
        
        return $exchange->createDto();
    }
}
