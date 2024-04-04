<?php

namespace Nisimpo\Auth\Http\Controllers;

use App\Models\Member;
use App\Models\Module;
use http\Exception;
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
use Spatie\Permission\Models\Permission;


class UserController extends Controller
{
    use AuthorizeUserTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected AuthorizationService $authorizationService,
        protected UserManagementService $userManagementService) {
        $this->middleware('auth');
    }

    public function users(): View {
        $users = $this->userManagementService->findAllUsers();
        return view('nisimpo::users.index',compact('users'));
    }

    public function index() {

        $users = $this->userManagementService->findAllUsers();

        if (\request()->ajax()){
            return  $this->userManagementService->usersDatatable();
        }

        return view('nisimpo::users.index', compact('users'));
    }

    public function roles() {

        $roles = $this->findAllRoles();

        if (\request()->ajax()){
            return  $this->userManagementService->RolesDatatable();
        }
        return view('nisimpo::roles.index', compact('roles'));
    }

    public function permissions(){

        $permissions = $this->findAllPermissions();

        if (\request()->ajax()){
            return  $this->userManagementService->permissionsDatatable();
        }
        return view('nisimpo::permissions.index', compact('permissions'));
    }

    /**
     * Assign some permissions to a role
     * @param Request $request a user input request
     * @return RedirectResponse
     */
    public function givePermissionsToRole(Request $request)
    {
        $dataReceived  = file_get_contents("php://input");
        $data = json_decode($dataReceived , true);

        $role = Role::find($data["role_id"]);

        if(!$role){
            throw RoleDoesNotExist::withId($data["role_id"],'');
        }else{
            if ($data["isChecked"]  === true){
                $this->authorizationService->givePermissionsToRole($role, $data["permission"]);
            }else{
                $this->authorizationService->revokePermissionFromRole($role,  $data["permission"]);
            }
        }
        return $this->successResponse();
    }

    public function givePermissionsToUser(Request $request)
    {
        $dataReceived  = file_get_contents("php://input");
        $data = json_decode($dataReceived , true);

        $user = $this->userManagementService->findUser($data["user_id"]);

        if(!$user){
            throw new ModelNotFoundException('User not found');
        }else{
            $permission =  $data["permission"];
            if ($data["isChecked"]  === true){
                $this->authorizationService->assignDirectPermissionToUser($user, $permission);
            }else{
              $this->authorizationService->revokePermissionFromUser($user, $permission);
            }
        }
        return $this->successResponse();
    }

    public function assignUserRole(Request $request)
    {
        $dataReceived  = file_get_contents("php://input");
        $data = json_decode($dataReceived , true);

        $user = User::find($data["user_id"]);

        if(!$user){
            throw new ModelNotFoundException('User not found');
        }else{
            if($data["isChecked"]  === true){
                $this->authorizationService->assignRoleToUser($user,$data["role"]);
            }else{
                $this->authorizationService->revokeRoleFromUser($user, $data["role"]);
            }
        }

        return $this->successResponse();
    }

    public function createNewPermissions(Request $request)
    {
        $input = $request->validate([
            "name" => "required|string"
        ]);

        $this->createPermissions($input["name"]);

        return $this->successResponse();

    }

    public function createNewRole(Request $request){
        //Role should be an array
        $input = $request->validate([
            "name" => "required|string"
        ]);

        $this->createRoles($input["name"]);

        return $this->successResponse();
    }

    public function showUser(string $id){
        $roles = $this->findAllRoles();
        $user = $this->userManagementService->findUser($id);
        $modules_permissions = Module::query()->with("permissions")->get();
        return view('nisimpo::users.show',compact("user","roles","modules_permissions"));
    }

    public function showRole(string $id){
        $roles = $this->findAllRoles();
        $role = $this->authorizationService->findRole($id);
        $modules_permissions = Module::query()->with("permissions")->get();
        return view('nisimpo::roles.show',compact("role","roles","modules_permissions"));
    }


    public function successResponse() {
        return response()->json([
            "status" => true,
            "message" => "Successfully Added !!"
        ]);
    }

    public function failedResponse() {
        return response()->json([
            "status" => false,
            "message" => "Failed to save changes !!"
        ]);
    }
}
