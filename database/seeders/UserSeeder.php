<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name'     => 'Admin',
                'role'     => 'admin',
                'password' => bcrypt( 'password123' ),
            ]
        );

        User::updateOrCreate(
            ['email' => 'seller@gmail.com'],
            [
                'name'     => 'Seller',
                'role'     => 'seller',
                'password' => bcrypt( 'password123' ),
            ]
        );

    }
}
