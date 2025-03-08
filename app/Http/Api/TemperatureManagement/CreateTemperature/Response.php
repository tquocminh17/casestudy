<?php

declare(strict_types=1);

namespace App\Http\Api\TemperatureManagement\CreateTemperature;

use App\Models\Temperature;
use App\Resources\TemperatureResource;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

final class Response implements Responsable
{
    public function __construct(
        private readonly Temperature $temperature
    ) {}

    public function toResponse($request): JsonResponse
    {
        return new JsonResponse([
            'data' => TemperatureResource::make($this->temperature)->toArray($request),
        ], SymfonyResponse::HTTP_CREATED);
    }
}
