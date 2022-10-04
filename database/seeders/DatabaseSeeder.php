<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Employee;
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
//        \App\Models\User::factory()->create([
//            'name' => 'Kakashi',
//            'email' => 'kakashi@admin.com',
//            'password' => bcrypt('password'),
//
//
//        ]);
//
//        User::factory(0)->create();
        Employee::factory(1000)->create();


    }
}
