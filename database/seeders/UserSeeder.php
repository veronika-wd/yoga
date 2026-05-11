<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'phone' => '+7 (000) 000-00-00',
                'name' => 'Admin',
                'password' => Hash::make('12345'),
                'is_admin' => true,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
