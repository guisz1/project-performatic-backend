<?php

namespace Application\Service\Exchange;

use Application\Exception\BusinessException;
use Application\Factory\ExchangeInterface;
use Core\Enums\TransferType;
use Core\Enums\UserRole;
use Core\Repositories\AccountRepository;
use Exception;
use Hyperf\Di\Annotation\Inject;

class TransferCreate implements ExchangeInterface
{
    private $sender;
    private $receiver;

    #[Inject]
    private AccountRepository $accountRepository;

    public function __construct(private string $document, private array $validated)
    {
        $this->sender = $this->accountRepository->findAccountByDocument($this->document);
        $this->receiver = $this->accountRepository->findAccountById($validated['to_id']);
    }

    public function verifyAmount(): bool
    {
        if ($this->sender->amount >= $this->validated["amount"]) {
            return true;
        }
        return false;
    }

    public function verifyAccountType(): bool
    {
        if ($this->sender->role == UserRole::Commom->value) {
            return true;
        }
        return false;
    }

    public function internalValidation(): bool
    {

        if ($this->sender->id != $this->receiver->id) {
            return true;
        }
        return false;
    }

    public function createDto(): array
    {
        return [
            'from_id' => $this->sender->id,
            'to_id' => $this->receiver->id,
            'amount' => $this->validated['amount'],
            'transfer_type' => TransferType::Transfer->value
        ];
    }
}
