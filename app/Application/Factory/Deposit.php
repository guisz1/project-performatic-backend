<?php

namespace Application\Factory;

use Application\Factory\Exchange;
use Application\Factory\ExchangeInterface;
use Application\Service\Exchange\DepositCreate;

class Deposit extends Exchange
{
    public function __construct(private string $document, private array $validated)
    {
    }
    public function getExchange(): ExchangeInterface
    {
        return new DepositCreate($this->document, $this->validated);
    }
}
