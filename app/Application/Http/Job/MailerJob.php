<?php

declare(strict_types=1);

namespace Application\Http\Job;

use GuzzleHttp\Client;
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

        $client = new Client();
        $res = $client->request('GET', 'https://run.mocky.io/v3/54dc2cf1-3add-45b5-b5a9-6bf7e7f1f4a6', [
            'to' => $this->params['to_id'],
            'amount' => $this->params['amount'],
            'tranfer_type' => $this->params['transfer_type']
        ]);

        if (!$res->getStatusCode() == 200) {
            return false;
        }

        var_dump("email enviado para " . $this->params["to_id"]);
        return true;
    }
}
