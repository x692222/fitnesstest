<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(
            [
                'email' => 'admin@admin.com'
            ],
            [
                'first_name' => 'System',
                'last_name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password'),
            ]
        );
    }
}
