<?php

namespace Application\Http\Resource;

use Hyperf\Resource\Json\JsonResource;

class ExchangeCreateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        $transfer = $this->resource;
        return [
            'code' => 200,
            'data' => [
                'transfer_id' => $transfer->id,
                'amount' => $transfer->amount
            ]
        ];
    }
}
