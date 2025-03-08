<?php declare(strict_types=1);

namespace App\Http\Api;

use Illuminate\Validation\Rule;

trait SupportsSorting
{
    /**
     * @param  array<string>  $allowedSorts
     * @return array<string, mixed>
     */
    protected function sortingRules(array $allowedSorts): array
    {
        return [
            'sort' => 'array',
            'sort.*' => [
                'sometimes',
                'string',
                Rule::in($allowedSorts),
            ],
        ];
    }
}
