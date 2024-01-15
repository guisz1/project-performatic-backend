<?php

namespace Application\Listener;

use Application\Factory\Exchanger;
use Application\Factory\TransferExecute;
use Application\Http\Event\ExchageRegistered;
use Application\Service\Exchange\ExchangeRun;
use Core\Repositories\ExchangeRepository;
use Hyperf\DbConnection\Db;
use Hyperf\Di\Annotation\Inject;
use Hyperf\Event\Contract\ListenerInterface;

class ExchangeRegisteredListener implements ListenerInterface
{
    #[Inject]
    private ExchangeRun $service;

    public function __construct(
        private ExchangeRepository $repository
    ) {
    }
    public function listen(): array
    {
        return [
            ExchageRegistered::class,
        ];
    }

    public function process(object $event): void
    {
        Db::transaction(function () use ($event) {
            $transfer = $this->repository->getExchangeById($event->transferId);
            $exchanger = new Exchanger(new TransferExecute($transfer));
            return $this->service->run($exchanger->exchange());
        });
    }
}
