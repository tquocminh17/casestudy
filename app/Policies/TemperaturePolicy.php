<?php declare(strict_types=1);

namespace App\Policies;

use App\Enums\PermissionName;
use App\Models\User;
use Illuminate\Auth\Access\Response;

final class TemperaturePolicy
{
    public function view(User $user): Response
    {
        if (! $user->hasPermissionTo(PermissionName::ViewTemperature->value)) {
            return Response::deny('The user does not have permission to do that.');
        }

        return Response::allow();
    }

    public function create(User $user): Response
    {
        if (! $user->hasPermissionTo(PermissionName::CreateTemperature->value)) {
            return Response::deny('The user does not have permission to do that.');
        }

        return Response::allow();
    }

    public function update(User $user): Response
    {
        if (! $user->hasPermissionTo(PermissionName::UpdateTemperature->value)) {
            return Response::deny('The user does not have permission to do that.');
        }

        return Response::allow();
    }

    public function delete(User $user): Response
    {
        if (! $user->hasPermissionTo(PermissionName::DeleteTemperature->value)) {
            return Response::deny('The user does not have permission to do that.');
        }

        return Response::allow();
    }
}
