<?php

namespace App\Policies;

use App\Models\User;

class PermissionPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function access(User $user, User $model): bool
    {
        return $user->email === 'jacek9012@gmail.com';
    }
}
