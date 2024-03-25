<?php

namespace Nisimpo\Auth\Services;

use Illuminate\Database\Eloquent\Model;

class AuthorizationService
{
    public function assignRoleToUser(mixed $user, ...$role){
        $user->assignRole($role);
    }
}
