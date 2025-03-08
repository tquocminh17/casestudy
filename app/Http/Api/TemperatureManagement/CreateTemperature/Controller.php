<?php

declare(strict_types=1);

namespace App\Http\Api\TemperatureManagement\CreateTemperature;

use App\Actions\Temperatures\CreateTemperature;

final class Controller
{
    public function __construct(
        private readonly CreateTemperature\Action $createTemperatureAction,
    ) {}

    public function __invoke(Request $request): Response
    {
        $response = $this->createTemperatureAction->execute(
            new CreateTemperature\ActionOptions(
                recordedAt: $request->recordedAt(),
                deviceId: $request->deviceId(),
                value: $request->value(),
            )
        );

        return new Response($response->temperature);
    }
}
