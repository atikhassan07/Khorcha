<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SetupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [
            'name' => 'Atik Hassan Himel',
            'email' => 'admin@gmail.com',
            'username' =>'atik',
            'status' => 1,
            'role' => 1,
            'password' => bcrypt('12345678'),
        ];

        User::create($admin);


    }
}
