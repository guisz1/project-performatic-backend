<?php

namespace Application\Http\Resource;

use Hyperf\Resource\Json\JsonResource;

class AccountMeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        $account = $this->resource;
        return [
            'code' => 200,
            'data' => [
                'id' => $account->id,
                'name' => $account->name,
                'email' => $account->email,
                'document' => $account->document,
                'amount' => $account->amount,
                'role' => $account->role
            ]
        ];
    }
}
