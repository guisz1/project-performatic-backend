<?php

namespace Application\Service\Mailer;

use Hyperf\Di\Annotation\Inject;

class CallSender
{
    #[Inject]
    protected SendEmail $emailSender;

    public function __construct(array $data)
    {
        $this->emailSender->push($data);
    }
}
