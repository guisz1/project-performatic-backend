<?php

namespace Application\Http\Event;

class ExchageRegistered
{

    public function __construct(public int $transferId)
    {
    }
}
