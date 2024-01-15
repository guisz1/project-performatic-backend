<?php

declare(strict_types=1);

namespace Core\Validation;

use App\Model\User;

class Cpf implements Validation
{
    public function __construct(
        private string $value
    ) {
    }

    public function validate(): bool
    {
        $value = preg_replace('/\D/', '', $this->value);

        if (strlen($value) != 11) {
            return false;
        }
        
        if (preg_match('/(\d)\1{10}/', $value)) {
            return false;
        }

        for ($t = 9; $t < 11; ++$t) {
            for ($d = 0, $c = 0; $c < $t; ++$c) {
                $d += $value[$c] * (($t + 1) - $c);
            }

            $d = ((10 * $d) % 11) % 10;

            if ($value[$c] != $d) {
                return false;
            }
        }

        if (User::where('document', '=', $value)->first()) {
            return false;
        }
        
        return true;
    }
}
