<?php

declare(strict_types=1);

namespace Infrastructure\Repositories;

use App\Model\Transfer;
use Core\Repositories\ExchangeRepository;

class ExchangeDatabaseRepository implements ExchangeRepository
{
    public function createExchange($dto)
    {
        return Transfer::create([
            "from_id" => $dto['from_id'],
            "to_id" => $dto['to_id'],
            "amount" => $dto['amount'],
            "transfer_type" => $dto['transfer_type'],
        ]);
    }

    public function getExchangeById($id)
    {
        return Transfer::where('id', $id)->first();
    }

    public function updateExchange($dto)
    {
        return true;
    }
}
