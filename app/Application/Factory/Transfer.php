<?php

namespace Application\Factory;

use Application\Factory\Exchange;
use Application\Factory\ExchangeInterface;
use Application\Service\Exchange\TransferCreate;

class Transfer extends Exchange
{
    public function __construct(private string $document, private array $validated)
    {
    }
    public function getExchange(): ExchangeInterface
    {
        return new TransferCreate($this->document, $this->validated);
    }
}
