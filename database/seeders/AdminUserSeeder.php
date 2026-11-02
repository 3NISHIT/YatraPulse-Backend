<?php

namespace Database\Seeders;

use App\Models\AdminUsers;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $email = config('admin.email');
        $password = config('admin.password');

        if (! $email || ! $password) {
            return;
        }

        AdminUsers::updateOrCreate(
            ['email' => $email],
            [
                'username' => config('admin.name'),
                'phone' => config('admin.phone'),
                'password' => Hash::make($password),
            ]
        );
    }
}