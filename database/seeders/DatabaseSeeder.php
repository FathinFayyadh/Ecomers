<?php

namespace Database\Seeders;

use App\Models\Roles;
use App\Models\User;
use GuzzleHttp\Promise\Create;
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
        Roles::Create([
            'id' => 1,
            'name' => 'admin',
        ]);
        Roles::Create([
        'id' => 2,
        'name' => 'user',
        ]);

        User::Create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'roles_id' => 1,
        ]);
    }
}
