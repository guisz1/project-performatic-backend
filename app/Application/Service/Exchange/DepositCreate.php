<?php

namespace Application\Service\Exchange;

use Application\Factory\ExchangeInterface;
use Core\Enums\TransferType;
use Core\Enums\UserRole;
use Core\Repositories\AccountRepository;
use Hyperf\Di\Annotation\Inject;

class DepositCreate implements ExchangeInterface
{
    private $receiver;

    #[Inject]
    private AccountRepository $accountRepository;

    public function __construct(private string $document, private array $validated)
    {
        $this->receiver = $this->accountRepository->findAccountByDocument($this->document);
    }

    public function verifyAmount(): bool
    {
        return true;
    }

    public function verifyAccountType(): bool
    {
        if ($this->receiver->role == UserRole::Commom->value) {
            return true;
        }
        return false;
    }

    public function internalValidation(): bool
    {
        return true;
    }

    public function createDto(): array
    {
        return [
            'from_id' => $this->receiver->id,
            'to_id' => $this->receiver->id,
            'amount' => $this->validated['amount'],
            'transfer_type' => TransferType::Deposit->value
        ];
    }
}
