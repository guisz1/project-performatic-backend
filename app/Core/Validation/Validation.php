<?php

declare(strict_types=1);

namespace Core\Validation;

interface Validation
{
    public function validate(): bool;
}
