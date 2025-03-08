<?php declare(strict_types=1);

namespace App\Http\Api\TemperatureManagement\ListTemperatures;

use Illuminate\Contracts\Database\Query\Builder;
use Spatie\QueryBuilder\AllowedFilter;

final class Filters
{
    /**
     * @return array<AllowedFilter>
     */
    public static function get(): array
    {
        return [
            AllowedFilter::callback('recorded_at_gte', function (Builder $query, string $value) {
                $query->where('recorded_at', '>=', $value);
            }),
            AllowedFilter::callback('recorded_at_lte', function (Builder $query, string $value) {
                $query->where('recorded_at', '<=', $value);
            }),
            AllowedFilter::callback('value_gte', function (Builder $query, float $value) {
                $query->where('value', '>=', $value);
            }),
            AllowedFilter::callback('value_lte', function (Builder $query, float $value) {
                $query->where('value', '<=', $value);
            }),
            AllowedFilter::exact('device_id'),
        ];
    }
}
