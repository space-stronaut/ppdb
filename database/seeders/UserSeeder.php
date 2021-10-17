<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'ADMIN',
            'name' => 'Aldo',
            'email' => 'abelr6099@gmail.com',
            'password' => bcrypt('Ronaldxtra123'),
            'role_id' => 1
        ]);

        User::create([
            'username' => 'PPDB2021',
            'name' => 'Arif',
            'email' => 'user@gmail.com',
            'password' => bcrypt('User1234'),
            'role_id' => 2
        ]);
    }
}
