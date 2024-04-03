<?php

namespace Nisimpo\Auth\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AuthorizationService
{
    /**
     * Create new role in the form of array
     * @param array $roles array of roles names
     */
    public function createRole(array $roles): void
    {
        foreach ($roles as $role){
            Role::create(['name' => $role]);
        }
    }

    /**
     * Create new permission in the form of array
     * @param array $permissions array of permission names
     */
    public function createPermissions(array $permissions): void
    {
        foreach ($permissions as $permission){
            Permission::create(['name' => $permission]);
        }
    }

    public function assignRoleToUser(mixed $user, ...$role): void
    {
        $user->syncRoles($role);
    }

    public function assignDirectPermissionToUser(mixed $user, ...$permissions): void
    {
        $user->givePermissionTo($permissions);
    }

    /**
     * This method is used to give a role some permission supply a role object with an array of permissions on parameters
     * if you have a single role wrap it to an array before supply
     * @param Role $role Object of a role currently supply a role from spatie library not custom role model
     * @param array $permissions array of permission names
     * @return void
     */
    public function givePermissionsToRole(Role $role, array $permissions): void
    {
        $role->syncPermissions($permissions);
    }
    public function grantAllPermissionToUser($user): void
    {
        $permission = Permission::all()->pluck('name');
        $user->givePermissionTo($permission);
    }

    public function revokeAllPermissionToUser($user): void
    {
        $permission = Permission::all()->pluck('name')->all();
        $user->revokePermissionTo($permission);
    }
    public function assignRolesToUser($user, ...$roles): void
    {
        $user->syncRoles($roles);
    }

    public function findAllRoles(): Collection
    {
        return Role::all();
    }
    public function findAllPermissions(): Collection
    {
        return Permission::all();
    }

    public function findRole($id)
    {
        return Role::find($id);
    }

    public function revokePermissionFromUser($user, $permission)
    {
        $user->revokePermissionTo($permission);
    }
}
