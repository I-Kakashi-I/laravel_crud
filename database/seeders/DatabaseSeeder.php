<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Inventory;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

//
        Department::factory(3)->create();
        Branch::factory(3)->create();
//        User::factory(0)->create();
        Employee::factory(10)
            ->create();
        Inventory::factory(20)->create();
        $this->call(RolesAndPermissionsSeeder::class);
        $user = User::factory()->create([
            'name' => 'Kakashi',
            'email' => 'kakashi@admin.com',
            'password' => bcrypt('password'),
        ]);
        $testUser=User::factory()->create([
            'name' => 'Itatchi',
            'email' => 'itatchi@admin.com',
            'password' => bcrypt('asddsa'),
        ]);
        $testUser->assignRole("user");
        $user->assignRole("super_admin");
    }
}
