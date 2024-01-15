<?php

declare(strict_types=1);

namespace App\Model;



/**
 * @property int $id 
 * @property string $name 
 * @property string $document 
 * @property string $email 
 * @property string $password 
 * @property string $role 
 * @property decimal $amount 
 * @property int $active 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 */
class User extends Model
{
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'users';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = [
        'name',
        'email',
        'password',
        'active',
        'role',
        'document',
        'amount'
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = [
        'id' => 'integer',
        'email' => 'string',
        'role' => 'string',
        'document' => 'string',
        'name' => 'string',
        'amount' => 'decimal:2',
        'active' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function transfers()
    {
        return $this->belongsToMany(Transfer::class, 'from_id', 'id');
    }

    public function receives()
    {
        return $this->belongsToMany(Transfer::class, 'to_id', 'id');
    }
}
