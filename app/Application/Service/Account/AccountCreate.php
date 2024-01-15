<?php

declare(strict_types=1);

namespace Application\Service\Account;

use Core\Enums\UserRole;
use Core\Helper\Util;
use Core\Repositories\AccountRepository;
use Core\Validation\Cpf;
use Hyperf\DbConnection\Db;

class AccountCreate
{
    public function __construct(
        private AccountRepository $repository
    ) {
    }

    public function run($dto)
    {
        $dto['hash'] = $this->hashPassword($dto['password']);
        $dto['role'] = $this->defineRole((new Cpf($dto['document']))->validate());
        $dto['document'] = Util::unmask($dto['document']);
        return Db::transaction(function () use ($dto) {

            $account = $this->repository->createAccount($dto);

            //TODO - Criar sms e email para criação step by step de conta

            return $account;
        });
    }

    private function hashPassword(string $password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    private function defineRole(bool $value): string
    {
        if (!$value) {
            return UserRole::Market->value;
        }
        return UserRole::Commom->value;
    }
}
