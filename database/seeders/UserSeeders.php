<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Modules\Procurement\App\Models\Entity;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        /*$user = User::query()->updateOrCreate(
            [
                'name' => 'Test User',
                'full_name' => 'Said khamis',
                'password' => Hash::make("password"),
                'username' => "Duce",
                'user_type' => "TYPE",
                'is_app_user' => 1,
                'gender' => 'MALE',
                'is_active' => 1,
                'image_url' => NULL,
                'change_password' => 0,
                'userable_type' => Entity::class,
                'userable_id' => 1
            ]
        );*/
        $employee = Employee::create(['name' => 'Duce']);
        $user = new \Nisimpo\Auth\Models\User([
            'full_name' => fake()->name(),
            'name' => 'boss',
            'username' => 'boss',
            'email' => 'test@example.com',
            'password' => Hash::make('password')
        ]);
        $employee->user()->save($user);
        $user->assignRoleToUser("super admin");
        $user->giveUserDirectPermissions(["view dashboard","view user","create user"]);
        //$user->assignRole(["super admin"]);
        //$user->syncPermissions(["view user","view all users"]);
    }
}
