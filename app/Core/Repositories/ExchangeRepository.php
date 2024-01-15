<?php

declare(strict_types=1);

namespace Core\Repositories;


interface ExchangeRepository
{
    public function createExchange($dto);
    public function getExchangeById($id);
    public function updateExchange($dto);
}
