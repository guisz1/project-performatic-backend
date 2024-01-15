<?php

declare(strict_types=1);

namespace Core\Helper;

use DateTime;
use ReflectionClass;

class Util
{
    public const PER_PAGE = 15;

    private const LOCALE_PT_BR = 'pt_BR';
    private const LOCALE_EN_US = 'en';

    public const DEFAULT_LOCALE = self::LOCALE_PT_BR;

    public const MASK_CPF = '%d%d%d.%d%d%d.%d%d%d-%d%d';

    public const MASK_CNPJ = '%d%d.%d%d%d.%d%d%d/%d%d%d%d-%d%d';

    public static function getShortClassName(object|string $object): string
    {
        return (new ReflectionClass($object))->getShortName();
    }

    public static function mask(string $value, string $mask)
    {
        return vsprintf($mask, str_split($value));
    }

    public static function unmask(string $value)
    {
        return preg_replace('/\D/', '', $value);
    }

    public static function toDate(DateTime|string $date = null, string $locale = self::DEFAULT_LOCALE): ?string
    {
        if (empty($date)) {
            return null;
        }

        $date = $date instanceof DateTime ? $date : new DateTime($date);

        return match ($locale) {
            self::LOCALE_PT_BR => $date->format('d/m/Y'),
            self::LOCALE_EN_US => $date->format('Y-m-d'),
        };
    }

    public static function toDateTime(DateTime|string $date = null, string $locale = self::DEFAULT_LOCALE): ?string
    {
        if (empty($date)) {
            return null;
        }

        $date = $date instanceof DateTime ? $date : new DateTime($date);

        return match ($locale) {
            self::LOCALE_PT_BR => $date->format('d/m/Y H:i:s'),
            self::LOCALE_EN_US => $date->format('Y-m-d H:i:s'),
        };
    }
}
