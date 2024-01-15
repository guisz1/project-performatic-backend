<?php

declare(strict_types=1);

namespace Infrastructure\Repositories;

use App\Model\User;
use Core\Repositories\AccountRepository;

class AccountDatabaseRepository implements AccountRepository
{
    public function createAccount($dto)
    {
        return User::create([
            'name' => $dto['name'],
            'document' => $dto['document'],
            'email' => $dto['email'],
            'password' => $dto['hash'],
            'role' => $dto['role'],
        ]);
    }

    public function findAccountByDocument($document)
    {
        return User::where('document', $document)->first();
    }

    public function findAccountById($id)
    {
        return User::where('id', $id)->first();
    }
}
