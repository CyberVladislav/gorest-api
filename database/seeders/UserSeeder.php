<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        User::query()->create([
            'name' => 'admin',
            'email' => 'admin@mail.ru',
            'password' => Hash::make('qwer'),
            'role_id' => Role::ADMIN,
        ]);
        User::query()->create([
            'name' => 'manager',
            'email' => 'manager@mail.ru',
            'password' => Hash::make('qwer'),
            'role_id' => Role::MANAGER,
        ]);
        User::query()->create([
            'name' => 'user',
            'email' => 'user@mail.ru',
            'password' => Hash::make('qwer'),
        ]);
    }
}
