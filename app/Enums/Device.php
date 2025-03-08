<?php declare(strict_types=1);

namespace App\Enums;

use App\Enums\Concerns\HasValues;

enum Device: string
{
    use HasValues;

    case TemperatureSensor = 'temperature_sensor';
}
