<?php declare(strict_types=1);

namespace App\Http\Api\TemperatureManagement\ListTemperatures;

final class Sorts
{
    public const string DEFAULT = '-recorded_at';

    public const array ALLOWED = [
        'recorded_at',
        '-recorded_at',
        'value',
        '-value',
    ];
}
