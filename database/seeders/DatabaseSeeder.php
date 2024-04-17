<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Nisimpo\Auth\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $this->call(ModulesSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(UserSeeders::class);

    }
}
