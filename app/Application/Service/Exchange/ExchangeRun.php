<?php

namespace Application\Service\Exchange;

use Application\Constants\ErrorCode;
use Application\Exception\BusinessException;
use Application\Service\Mailer\CallSender;
use Application\Service\Mailer\SendEmail;
use Core\Enums\TransferStatus;
use Core\Repositories\AccountRepository;
use Core\Repositories\ExchangeRepository;
use Hyperf\Di\Annotation\Inject;

class ExchangeRun
{

    public function __construct(
        private ExchangeRepository $exchangeRepository,
        private AccountRepository $accountRepository
    ) {
    }

    public function run($dto)
    {
        $exchange = $this->exchangeRepository->getExchangeById($dto["transfer_id"]);
        try {
            $fromUser = $this->accountRepository->findAccountById($dto["from_id"]);
            $toUser = $this->accountRepository->findAccountById($dto["to_id"]);
            $fromUser->amount = $fromUser->amount - $dto["amount"];
            $fromUser->save();
            $toUser->amount = $toUser->amount + $dto["amount"];
            $toUser->save();
            $exchange->status = TransferStatus::Success->value;
            $exchange->message = "Success";
            $exchange->save();
        } catch (\Exception $e) {
            $exchange->status = TransferStatus::Failed->value;
            $exchange->message = "Transfer error";
            $exchange->save();
            throw new BusinessException(ErrorCode::LOCKED_ERROR);
        }
        new CallSender([
            "to_id" => $exchange->to_id,
            "amount" => $exchange->amount,
            "transfer_type" => $exchange->transfer_type
        ]);
        return $exchange;
    }
}
