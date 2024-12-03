<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Status;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'engineer',
            'email' => 'engineer@example.com',
            'password' => bcrypt('12345678'),
            'role' => 'engineer',
        ]);
        
        User::create([
            'name' => 'coordinator',
            'email' => 'coordinator@example.com',
            'password' => bcrypt('12345678'),
            'role' => 'coordinator',
        ]);

        User::create([
            'name' => 'inspector',
            'email' => 'inspector@example.com',
            'password' => bcrypt('12345678'),
            'role' => 'inspector',
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
        ]);

        Status::create(['status' => 'pending']);
        Status::create(['status' => 'proposed']);
        Status::create(['status' => 'rejected']);
        Status::create(['status' => 'pass']);
        Status::create(['status' => 'fail']);
    }
}
