<?php

namespace Application\Http\Controller\Exchange;

use Application\Factory\Deposit;
use Application\Factory\Transfer;
use Application\Factory\Exchanger;
use Application\Http\Controller\AbstractController;
use Application\Http\Request\CreateDepositWithdrawRequest;
use Application\Http\Request\CreateTransferRequest;
use Application\Http\Resource\ExchangeCreateResource;
use Application\Service\Exchange\ExchangeCreate;
use Application\Service\Mailer\SendEmail;
use Hyperf\Di\Annotation\Inject;

class ExchangeController extends AbstractController
{
    #[Inject]
    protected SendEmail $emailSender;
    
    public function deposit(CreateDepositWithdrawRequest $request, ExchangeCreate $service)
    {
        $request->validateResolved();
        $document = $request->getAttribute("document");
        $exchanger = new Exchanger(new Deposit($document, $request->validated()));
        $exchange = $service->run($exchanger->exchange());
        return new ExchangeCreateResource($exchange);
    }

    public function transfer(CreateTransferRequest $request, ExchangeCreate $service)
    {
        $request->validateResolved();
        $document = $request->getAttribute("document");
        $exchanger = new Exchanger(new Transfer($document, $request->validated()));
        $exchange = $service->run($exchanger->exchange());
        
        return new ExchangeCreateResource($exchange);
    }

    public function withdraw()
    {
        // TO - DO withdraw 
    }
}
