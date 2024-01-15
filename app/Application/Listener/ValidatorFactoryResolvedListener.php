<?php

declare(strict_types=1);

namespace Application\Listener;

use Core\Validation\Cnpj;
use Core\Validation\Cpf;
use Hyperf\Event\Annotation\Listener;
use Hyperf\Event\Contract\ListenerInterface;
use Hyperf\Validation\Event\ValidatorFactoryResolved;

#[Listener]
class ValidatorFactoryResolvedListener implements ListenerInterface
{
    public function listen(): array
    {
        return [
            ValidatorFactoryResolved::class,
        ];
    }

    /**
     * @param ValidatorFactoryResolved $event
     */
    public function process(object $event): void
    {
        $validator = $event->validatorFactory;

        $validator->extend('document', function ($attribute, $value, $parameters, $validator) {

            return (new Cpf((string) $value))->validate() || (new Cnpj((string) $value))->validate();
        });
    }
}
