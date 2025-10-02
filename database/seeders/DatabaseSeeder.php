<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'employee',
            'email' => 'emp@gmail.com',
            'password' => Hash::make('emp123'),
            'role'     => 'employees',
            'status'   => 'on going',
            'expired' => 'never'
        ]);
    }
}
