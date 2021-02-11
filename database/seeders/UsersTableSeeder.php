<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => 1,
            'name' => 'Admin User',
            'email' => 'admin@userc.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);
    }
}
