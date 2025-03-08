<?php

declare(strict_types=1);

namespace App\Http\Api\TemperatureManagement\ListTemperatures;

use App\Http\Api\FormatsPaginators;
use App\Models\Temperature;
use App\Resources\TemperatureResource;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

final class Response implements Responsable
{
    use FormatsPaginators;

    /**
     * @param  LengthAwarePaginator<Temperature>  $temperatures
     */
    public function __construct(
        private readonly LengthAwarePaginator $temperatures
    ) {}

    public function toResponse($request): JsonResponse
    {
        return new JsonResponse([
            'data' => TemperatureResource::collection($this->temperatures)->toArray($request),
            'paginator' => $this->formatLengthAwarePaginator($this->temperatures),
        ], SymfonyResponse::HTTP_OK);
    }
}
