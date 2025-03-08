<?php declare(strict_types=1);

namespace App\Actions\Temperatures\CreateTemperature;

use Carbon\CarbonImmutable;

final class ActionOptions
{
    public function __construct(
        public readonly CarbonImmutable $recordedAt,
        public readonly string $deviceId,
        public readonly float $value,
    ) {}
}
