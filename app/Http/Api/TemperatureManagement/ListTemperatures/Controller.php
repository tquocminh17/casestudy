<?php

declare(strict_types=1);

namespace App\Http\Api\TemperatureManagement\ListTemperatures;

use App\Models\Temperature;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\QueryBuilder;

final class Controller
{
    public function __invoke(Request $request): Response
    {
        /** @var LengthAwarePaginator<Temperature> $temperatures */
        $temperatures = QueryBuilder::for(Temperature::class)
            ->allowedFilters(Filters::get())
            ->defaultSort(Sorts::DEFAULT)
            ->allowedSorts(Sorts::ALLOWED)
            ->jsonPaginate();

        return new Response($temperatures);
    }
}
