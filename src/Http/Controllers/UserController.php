<?php

namespace Nisimpo\Auth\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\AuthorizeUserTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Nisimpo\Auth\Models\User;
use Nisimpo\Auth\Services\AuthorizationService;
use Nisimpo\Auth\Services\UserManagementService;
use Spatie\Permission\Exceptions\RoleDoesNotExist;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    use AuthorizeUserTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected AuthorizationService $authorizationService,
        protected UserManagementService $userManagementService)
    {
        $this->middleware('auth');
    }
    public function index(): View
    {
        $users = $this->userManagementService->findAllUsers();
        return view('nisimpo::users.show',compact('users'));
    }

    public function roles():View{
        $roles = $this->findAllRoles();
        return view('nisimpo::roles.index', compact('roles'));
    }
    public function permissions(): View{
        $permissions = $this->findAllPermissions();
        return view('nisimpo::permissions.index', compact('permissions'));
    }
    public function users(): View{
        $users = $this->userManagementService->findAllUsers();
        return view('nisimpo::users.index', compact('users'));
    }

    /**
     * Assign some permissions to a role
     * @param Request $request a user input request
     * @return RedirectResponse
     */
    public function givePermissionsToRole(Request $request): RedirectResponse
    {
        $role = Role::findById($request->role_id);
        if(!$role){
            throw RoleDoesNotExist::withId($request->role_id,'');
        }
        $this->authorizationService->givePermissionsToRole($role, $request->permissions);
        return back();
    }

    public function assignUserRole(Request $request): RedirectResponse
    {
        $user = User::find($request->user_id);
        if($user){
            throw new ModelNotFoundException('User not found');
        }
        $this->authorizationService->assignRoleToUser($user,$request->roles);
        return back();
    }

    public function createNewPermissions(Request $request): RedirectResponse
    {
        //Permissions should be an array
        $this->createPermissions($request->permissions);
        return back();
    }

    public function createNewRole(Request $request): RedirectResponse
    {
        //Role should be an array
        $this->createRoles($request->roles);
        return back();
    }

}
