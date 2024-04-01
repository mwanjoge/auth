<?php

namespace Nisimpo\Auth\Services;

use Illuminate\Database\Eloquent\Collection;
use Nisimpo\Auth\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserManagementService
{
    public function findAllUsers(): Collection
    {
        return User::all();
    }

}
