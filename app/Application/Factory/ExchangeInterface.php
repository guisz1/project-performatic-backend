<?php

namespace Application\Factory;

interface ExchangeInterface
{
    public function verifyAmount(): bool;
    public function verifyAccountType(): bool;
    public function internalValidation(): bool;
    public function createDto(): array;
}
