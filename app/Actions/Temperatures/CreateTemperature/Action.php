<?php declare(strict_types=1);

namespace App\Actions\Temperatures\CreateTemperature;

use App\Models\Temperature;

final class Action
{
    public function execute(ActionOptions $options): ActionResponse
    {
        $temperature = new Temperature;
        $temperature->recorded_at = $options->recordedAt;
        $temperature->device_id = $options->deviceId;
        $temperature->value = $options->value;

        $temperature->save();

        return new ActionResponse($temperature);
    }
}
