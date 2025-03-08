<?php declare(strict_types=1);

namespace App\Http\Api;

use Illuminate\Validation\Rule;

trait SupportsFilter
{
    /**
     * @param  array<string, mixed>  $filters
     * @return array<string, mixed>
     */
    protected function filterRules(array $filters): array
    {
        $allowedFilters = array_keys($filters);

        return [
            'filter' => 'array',
            'filter.*' => Rule::in($allowedFilters),
            ...array_combine(
                array_map(
                    fn (string $key) => "filter.$key",
                    $allowedFilters,
                ),
                $filters,
            ),
        ];
    }
}
