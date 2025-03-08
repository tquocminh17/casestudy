<?php

declare(strict_types=1);

namespace App\Http\Api\TemperatureManagement\ListTemperatures;

use App\Enums\Device;
use App\Http\Api\SupportsFilter;
use App\Http\Api\SupportsPagination;
use App\Http\Api\SupportsSorting;
use App\Models\Temperature;
use Illuminate\Auth\Access\Response;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class Request extends FormRequest
{
    use SupportsFilter;
    use SupportsPagination;
    use SupportsSorting;

    public function authorize(Gate $gate): Response
    {
        return $gate->inspect('view', Temperature::class);
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return array_merge(
            $this->filterRules([
                'device_id' => ['required', 'string', Rule::enum(Device::class)],
                'recorded_at_gte' => 'required|date|date_format:Y-m-d\TH:i:s\Z|before_or_equal:filter.recorded_at_lte',
                'recorded_at_lte' => 'required|date|date_format:Y-m-d\TH:i:s\Z|after_or_equal:filter.recorded_at_gte',
                'value_gte' => 'filled|numeric|before_or_equal:filter.value_lte',
                'value_lte' => 'filled|numeric|after_or_equal:filter.value_gte',
            ]),
            $this->sortingRules(Sorts::ALLOWED),
            $this->paginationRules(),
        );
    }
}
