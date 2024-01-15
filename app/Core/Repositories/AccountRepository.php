<?php

declare(strict_types=1);

namespace Core\Repositories;


interface AccountRepository
{
    public function createAccount($dto);
    public function findAccountByDocument($document);
    public function findAccountById($id);
}
