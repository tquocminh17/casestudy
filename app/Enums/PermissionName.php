<?php declare(strict_types=1);

namespace App\Enums;

use App\Enums\Concerns\HasValues;

enum PermissionName: string
{
    use HasValues;

    case ViewTemperature = 'temperature.view';
    case CreateTemperature = 'temperature.create';
    case UpdateTemperature = 'temperature.update';
    case DeleteTemperature = 'temperature.delete';
}
