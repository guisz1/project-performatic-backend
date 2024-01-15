<?php

namespace Application\Service\Exchange;

use Application\Factory\ExchangeInterface;
use Core\Enums\UserRole;
use Core\Repositories\AccountRepository;
use GuzzleHttp\Client;
use Hyperf\Di\Annotation\Inject;

class TransferRun implements ExchangeInterface
{
    private $sender;
    private $receiver;

    #[Inject]
    private AccountRepository $accountRepository;

    public function __construct(private $transfer)
    {
        $this->sender = $this->accountRepository->findAccountById($this->transfer->from_id);
        $this->receiver = $this->accountRepository->findAccountById($this->transfer->to_id);
    }

    public function verifyAmount(): bool
    {
        if ($this->sender->amount >= $this->transfer->amount) {
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
        if ($this->sender->id == $this->receiver->id) {
            return false;
        }

        $client = new Client();
        $res = $client->request('GET', 'https://run.mocky.io/v3/5794d450-d2e2-4412-8131-73d0293ac1cc', [
            'from' => $this->sender->id,
            'to' => $this->receiver->id,
            'amount' => $this->transfer->amount,
        ]);

        if (!$res->getStatusCode() == 200 && !json_decode($res->getBody())['message'] == "Autorizado") {
            return false;
        }

        return true;
    }

    public function createDto(): array
    {
        return [
            "transfer_id" => $this->transfer->id,
            'from_id' => $this->sender->id,
            'to_id' => $this->receiver->id,
            'amount' => $this->transfer->amount,
        ];
    }
}
