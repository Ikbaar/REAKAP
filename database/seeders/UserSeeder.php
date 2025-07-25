<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // <-- ini penting!
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
    'username' => 'admin',
    'password' => Hash::make('adminpass'),
    'role' => 'admin',
]);

User::create([
    'username' => 'viewer',
    'password' => Hash::make('viewerpass'),
    'role' => 'viewer',
]);

    }
}
