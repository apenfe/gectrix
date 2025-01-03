<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.admin',
            'password' => bcrypt('12345678Aa*'),
            'role' => 'admin',
            'telegram_id' => '744214723',
        ]);

        User::factory()->create([
            'name' => 'guest',
            'email' => 'guest@guest.guest',
            'password' => bcrypt('12345678Aa*'),
            'role' => 'user',
        ]);

    }
}
