<?php declare(strict_types=1);

namespace App\Http\Api;

trait SupportsPagination
{
    /**
     * @return array<string, string>
     */
    protected function paginationRules(): array
    {
        return [
            'page' => 'array:number,size,enabled',
            'page.number' => 'filled|integer|min:1',
            'page.size' => "filled|integer|min:1|max:{$this->pageMax()}",
        ];
    }

    private function pageMax(): int
    {
        /** @var int */
        return config('json-api-paginate.max_results');
    }
}
