<?php

namespace App\Application\Service\Account;

use Core\Repositories\AccountRepository;

class AccountMe
{
    public function __construct(
        private AccountRepository $repository
    ) {
    }

    public function run($document)
    {
        return $this->repository->findAccountByDocument($document);
    }
}
