<?php

namespace Nisimpo\Auth\Http\Controllers;

use App\Models\Member;
use App\Models\Module;
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
        protected UserManagementService $userManagementService)
    {
        $this->middleware('auth');
    }

    public function users(): View {
        $users = $this->userManagementService->findAllUsers();
        return view('nisimpo::users.index',compact('users'));
    }

    public function index() {

        $users = $this->userManagementService->findAllUsers();

        if (\request()->ajax()){

            $perPage = \request()->input("length");
            $page = ($perPage !== 0)
                ? (\request()->input("start") / $perPage + 1)
                : 1;

            $searchValue = request()->input('search.value');

            $query = User::query();

            $totalRecordsBeforeSearch = User::count();

            if (!empty($searchValue)) {
                $query->where('full_name', 'like', '%' . $searchValue . '%')
                    ->orWhere('id', 'like', '%' . $searchValue . '%')
                    ->orWhere('username', 'like', '%' . $searchValue . '%')
                    ->orWhere('email', 'like', '%' . $searchValue . '%')
                    ->orWhere('gender', 'like', '%' . $searchValue . '%')
                    ->orWhere('is_app_user', 'like', '%' . $searchValue . '%')
                    ->orWhere('is_active', 'like', '%' . $searchValue . '%');
                /*->orWhereHas('ward', function ($subQuery) use ($searchValue) {
                    $subQuery->where('name', 'like', '%' . $searchValue . '%');
                })
                ->orWhereHas('ward.district', function ($subQuery) use ($searchValue) {
                    $subQuery->where('name', 'like', '%' . $searchValue . '%');
                });*/
            }

            $totalRecordsAfterSearch = $query->count();

            $users = $query->skip(($page - 1) * $perPage)
                ->take($perPage)
                ->get();

            return response()->json([
                'draw' => \request()->input("draw"),
                "recordsTotal" => $totalRecordsBeforeSearch,
                'recordsFiltered' => $totalRecordsAfterSearch,
                'data' => $users->map(function ($user) {
                    return [
                        'id' => $user->id,
                        'full_name' => $user->full_name,
                        'name' => $user->name ,
                        'email' => $user->email,
                        'gender' => $user->gender,
                        'action' => '<div class="dropdown">
                                                <span class="glyphicon glyphicon-option-vertical" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" aria-hidden="true"></span>
                                                <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenu1">
                                                    <li class="dropdown-header">Actions</li>
                                                    <li>
                                                        <a href="'. route("user.show",[ $user->id]).'">
                                                            <span class="glyphicon glyphicon-eye-open text-success" aria-hidden="true"></span> View
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <span class="glyphicon glyphicon-edit text-primary" aria-hidden="true"></span> Edit
                                                        </a>
                                                    </li>
                                                    <li role="separator" class="divider"></li>
                                                    <li>
                                                        <a href="#">
                                                            <span class="glyphicon glyphicon-trash text-danger" aria-hidden="true"></span> Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>',
                    ];
                }),
                'input' => [
                    'draw' => \request()->input("draw"),
                    'columns' => \request()->input("columns"),
                    'order' => \request()->input("order"),
                    'start' => \request()->input("start"),
                    'length' => \request()->input("length"),
                    'search' => \request()->input("search"),
                    '_' => \request()->input("_"),
                ],
            ]);
        }

        return view('nisimpo::users.index', compact('users'));
    }

    public function roles() {

        $roles = $this->findAllRoles();

        if (\request()->ajax()){

            $perPage = \request()->input("length");
            $page = ($perPage !== 0)
                ? (\request()->input("start") / $perPage + 1)
                : 1;

            $searchValue = request()->input('search.value');

            $query = Role::query();

            $totalRecordsBeforeSearch = Role::count();

            if (!empty($searchValue)) {
                $query->where('name', 'like', '%' . $searchValue . '%')
                    ->orWhere('guard_name', 'like', '%' . $searchValue . '%');
            }

            $totalRecordsAfterSearch = $query->count();

            $roles = $query->skip(($page - 1) * $perPage)
                ->take($perPage)
                ->get();

            return response()->json([
                'draw' => \request()->input("draw"),
                "recordsTotal" => $totalRecordsBeforeSearch,
                'recordsFiltered' => $totalRecordsAfterSearch,
                'data' => $roles->map(function ($role) {
                    return [
                        'id' => $role->id,
                        'name' => $role->name,
                        'guard_name' => $role->guard_name ,
                        'action' => '<div class="dropdown">
                                                <span class="glyphicon glyphicon-option-vertical" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" aria-hidden="true"></span>
                                                <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenu1">
                                                    <li class="dropdown-header">Actions</li>
                                                    <li>
                                                        <a href="'. route("role.show",[ $role->id]).'">
                                                            <span class="glyphicon glyphicon-eye-open text-success" aria-hidden="true"></span> View
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <span class="glyphicon glyphicon-edit text-primary" aria-hidden="true"></span> Edit
                                                        </a>
                                                    </li>
                                                    <li role="separator" class="divider"></li>
                                                    <li>
                                                        <a href="#">
                                                            <span class="glyphicon glyphicon-trash text-danger" aria-hidden="true"></span> Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>',
                    ];
                }),
                'input' => [
                    'draw' => \request()->input("draw"),
                    'columns' => \request()->input("columns"),
                    'order' => \request()->input("order"),
                    'start' => \request()->input("start"),
                    'length' => \request()->input("length"),
                    'search' => \request()->input("search"),
                    '_' => \request()->input("_"),
                ],
            ]);
        }
        return view('nisimpo::roles.index', compact('roles'));
    }

    public function permissions(){

        $permissions = $this->findAllPermissions();

        if (\request()->ajax()){

            $perPage = \request()->input("length");
            $page = ($perPage !== 0)
                ? (\request()->input("start") / $perPage + 1)
                : 1;

            $searchValue = \request()->input('search.value');

            $query = Permission::query();

            $totalRecordsBeforeSearch = Permission::count();

            if (!empty($searchValue)) {
                $query->where('name', 'like', '%' . $searchValue . '%')
                    ->orWhere('guard_name', 'like', '%' . $searchValue . '%');
            }

            $totalRecordsAfterSearch = $query->count();

            $permissions = $query->skip(($page - 1) * $perPage)
                ->take($perPage)
                ->get();

            return response()->json([
                'draw' => \request()->input("draw"),
                "recordsTotal" => $totalRecordsBeforeSearch,
                'recordsFiltered' => $totalRecordsAfterSearch,
                'data' => $permissions->map(function ($permission) {
                    return [
                        'id' => $permission->id,
                        'name' => $permission->name,
                        'guard_name' => $permission->guard_name ,
                        'action' => '<div class="dropdown">
                                                <span class="glyphicon glyphicon-option-vertical" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" aria-hidden="true"></span>
                                                <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenu1">
                                                    <li class="dropdown-header">Actions</li>
                                                    <li>
                                                        <a href="'. route("user.show",[ $permission->id]).'">
                                                            <span class="glyphicon glyphicon-eye-open text-success" aria-hidden="true"></span> View
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <span class="glyphicon glyphicon-edit text-primary" aria-hidden="true"></span> Edit
                                                        </a>
                                                    </li>
                                                    <li role="separator" class="divider"></li>
                                                    <li>
                                                        <a href="#">
                                                            <span class="glyphicon glyphicon-trash text-danger" aria-hidden="true"></span> Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>',
                    ];
                }),
                'input' => [
                    'draw' => \request()->input("draw"),
                    'columns' => \request()->input("columns"),
                    'order' => \request()->input("order"),
                    'start' => \request()->input("start"),
                    'length' => \request()->input("length"),
                    'search' => \request()->input("search"),
                    '_' => \request()->input("_"),
                ],
            ]);
        }
        return view('nisimpo::permissions.index', compact('permissions'));
    }

    /**
     * Assign some permissions to a role
     * @param Request $request a user input request
     * @return RedirectResponse
     */
    public function givePermissionsToRole(Request $request): RedirectResponse
    {
        $data  = $request->all();

        $role = Role::findById($request->role_id);
        if(!$role){
            throw RoleDoesNotExist::withId($request->role_id,'');
        }else{
            if ($data["isChecked"]  === true){
                $this->authorizationService->givePermissionsToRole($role, $request->permissions);
            }
        }
        return back();
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
        return back();
    }

    public function assignUserRole(Request $request)
    {
        $data  = $request->all();

        //return json_encode($data["user_id"]);
        $user = User::find($request->user_id);

        if($user){
            throw new ModelNotFoundException('User not found');
        }else{
            if($data["isChecked"]  === true){
                $this->authorizationService->assignRoleToUser($user,$request->roles);
            }
        }

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

}
