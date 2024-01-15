<?php

declare(strict_types=1);

namespace Application\Http\Job;

use Hyperf\AsyncQueue\Job;

class MailerJob extends Job
{
    public $params;

    public function __construct($params)
    {
        $this->params = $params;
    }

    public function handle()
    {
    }
}
