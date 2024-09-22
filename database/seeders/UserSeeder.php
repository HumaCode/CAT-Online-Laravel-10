<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users      = ['administrator', 'admin', 'user'];
        $default    = [
            'email_verified_at' => now(),
            'password'          => Hash::make('123'),
            'remember_token'    => Str::random(10)
        ];

        foreach ($users as $value) {
            User::create(
                [...$default, ...[
                    'name'              => ucwords($value),
                    'username'          => $value,
                    'email'             => $value . '@gmail.com',

                ]]
            )->assignRole($value);
        }
    }
}
