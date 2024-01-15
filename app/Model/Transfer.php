<?php

declare(strict_types=1);

namespace App\Model;

class Transfer extends Model
{
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'transfers';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = [
        'from_id',
        'to_id',
        'amount',
        'transfer_type',
        'status',
        'message'
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'from_id' => 'integer', 'to_id' => 'integer', 'amount' => 'decimal:2', 'status' => 'string', 'message' => 'string', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}
