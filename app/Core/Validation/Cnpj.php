<?php

declare(strict_types=1);

namespace Core\Validation;

use App\Model\User;

class Cnpj implements Validation
{
    public function __construct(
        private string $value
    ) {
    }

    public function validate(): bool
    {
        $c = preg_replace('/\D/', '', $this->value);

        $b = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];

        if (strlen($c) != 14) {
            return false;
        } elseif (preg_match("/^{$c[0]}{14}$/", $c) > 0) {
            return false;
        }

        for ($i = 0, $n = 0; $i < 12; $n += $c[$i] * $b[++$i]);

        if ($c[12] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
            return false;
        }

        for ($i = 0, $n = 0; $i <= 12; $n += $c[$i] * $b[$i++]);

        if ($c[13] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
            return false;
        }

        if (User::where('document', '=', $c)->first()) {
            return false;
        }
        
        return true;
    }
}
