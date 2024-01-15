<?php

namespace Application\Service\Exchange;

use Core\Repositories\ExchangeRepository;
use Application\Http\Event\ExchageRegistered;
use Hyperf\Di\Annotation\Inject;
use Psr\EventDispatcher\EventDispatcherInterface;

class ExchangeCreate
{

    #[Inject]
    private EventDispatcherInterface $eventDispatcher;

    public function __construct(
        private ExchangeRepository $repository
    ) {
    }

    public function run($dto)
    {
        $repository = $this->repository->createExchange($dto);
        $this->eventDispatcher->dispatch(new ExchageRegistered($repository->id));
        return $repository;
    }
}
