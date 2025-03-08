<?php declare(strict_types=1);

namespace App\Http\Api;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

trait FormatsPaginators
{
    /**
     * @template TItem of Model
     *
     * @param  LengthAwarePaginator<TItem>  $paginator
     * @return array{
     *   current_page: int,
     *   from: int|null,
     *   last_page: int,
     *   per_page: int,
     *   to: int|null,
     *   total: int
     * }
     */
    protected function formatLengthAwarePaginator(LengthAwarePaginator $paginator): array
    {
        return [
            'current_page' => $paginator->currentPage(),
            'from' => $paginator->firstItem(),
            'last_page' => $paginator->lastPage(),
            'per_page' => $paginator->perPage(),
            'to' => $paginator->lastItem(),
            'total' => $paginator->total(),
        ];
    }
}
