<?php

declare(strict_types=1);

namespace App\Http\Api\TemperatureManagement\CreateTemperature;

use App\Enums\Device;
use App\Models\Temperature;
use Carbon\CarbonImmutable;
use Illuminate\Auth\Access\Response;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class Request extends FormRequest
{
    public function authorize(Gate $gate): Response
    {
        return $gate->inspect('create', Temperature::class);
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'value' => 'required|numeric',
            'device_id' => ['string', 'required', Rule::enum(Device::class)],
            'recorded_at' => 'required|date|date_format:Y-m-d\TH:i:s\Z',
        ];
    }

    public function value(): float
    {
        return $this->float('value');
    }

    public function deviceId(): string
    {
        return $this->string('device_id')->value();
    }

    public function recordedAt(): CarbonImmutable
    {
        return $this->immutableDate('recorded_at');
    }
}
