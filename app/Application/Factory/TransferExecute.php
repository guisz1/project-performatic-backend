<?php

namespace Application\Factory;

use Application\Factory\Exchange;
use Application\Factory\ExchangeInterface;
use Application\Service\Exchange\TransferRun;

class TransferExecute extends Exchange
{
    public function __construct(private $transfer)
    {
    }
    public function getExchange(): ExchangeInterface
    {
        return new TransferRun($this->transfer);
    }
}
