<?php declare(strict_types=1);

namespace App\Actions\Temperatures\CreateTemperature;

use App\Models\Temperature;

final class ActionResponse
{
    public function __construct(
        public readonly Temperature $temperature,
    ) {}
}
