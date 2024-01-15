<?php

namespace Application\Http\Controller\Account;

use App\Application\Service\Account\AccountMe;
use Application\Http\Controller\AbstractController;
use Application\Http\Request\CreateAccountRequest;
use Application\Http\Resource\AccountMeResource;
use Application\Http\Resource\CreatedResource;
use Application\Service\Account\AccountCreate;
use Hyperf\HttpServer\Request;

class AccountController extends AbstractController
{
    public function create(CreateAccountRequest $request, AccountCreate $service)
    {
        $request->validateResolved();
        $service->run($request->validated());

        return new CreatedResource([]);
    }

    public function me(Request $request, AccountMe $service)
    {
        $document =  $request->getAttribute('document');

        return (new AccountMeResource($service->run($document)))->toResponse();
    }
}
