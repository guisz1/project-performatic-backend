<?php

namespace Application\Factory;

class Exchanger
{
    public function __construct(private Exchange $exchange)
    {
    }

    public function exchange(): array
    {
        return $this->exchange->getExchangeDto();
    }
}
