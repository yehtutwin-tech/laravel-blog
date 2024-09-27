<?php

namespace Database\Seeders;

use App\Models\User;
use App\RoleEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Ko Ko',
            'role' => RoleEnum::USER,
            'email' => 'koko@example.com',
        ]);

        User::factory()->create([
            'name' => 'Mg Mg',
            'role' => RoleEnum::ADMIN,
            'email' => 'mgmg@example.com',
        ]);
    }
}
