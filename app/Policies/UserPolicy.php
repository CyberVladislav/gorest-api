<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function look(User $user)
    {
        return in_array($user->role_id, [Role::ADMIN, Role::MANAGER]);
    }

    public function delete(User $user)
    {
        return $user->role_id === Role::ADMIN;
    }
}
