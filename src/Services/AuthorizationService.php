<?php

namespace Nisimpo\Ui\Services;

use Illuminate\Database\Eloquent\Model;

class AuthorizationService
{
    public function assignRoleToUser(mixed $user, ...$role){
        $user->assignRole($role);
    }
}
