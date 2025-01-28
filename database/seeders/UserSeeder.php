<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Nitchy',
                'email' => 'nitchy@mail.com',
                'password' => Hash::make('nitchy1234'),
                'role_id' => 1,
                'updated_at' => NOW(),
                'created_at' => NOW()
            ],
            [
                'name' => 'Mary',
                'email' => 'mary@mail.com',
                'password' => Hash::make('mary2345'),
                'role_id' => 2,
                'updated_at' => NOW(),
                'created_at' => NOW()
            ],
            [
                'name' => 'Hector',
                'email' => 'hector@mail.com',
                'password' => Hash::make('hector3456'),
                'role_id' => 2,
                'updated_at' => NOW(),
                'created_at' => NOW()
            ]
        ];

        User::insert($users);
    }
}
