<?php declare(strict_types=1);

namespace App\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\Temperature
 */
final class TemperatureResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
            'value' => $this->value,
            'device_id' => $this->device_id,
            'recorded_at' => $this->recorded_at?->toIso8601ZuluString(),
        ];
    }
}
