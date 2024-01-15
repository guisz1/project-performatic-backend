<?php

namespace Application\Service\Mailer;

use Application\Http\Job\MailerJob;
use Hyperf\AsyncQueue\Driver\DriverFactory;
use Hyperf\AsyncQueue\Driver\DriverInterface;

class SendEmail
{

    /**
     * @var DriverInterface
     */
    protected $driver;

    public function __construct(DriverFactory $driverFactory)
    {
        $this->driver = $driverFactory->get('default');
    }

    public function push($params, int $delay = 5): bool
    {
        return $this->driver->push(new MailerJob($params), $delay);
    }
}
