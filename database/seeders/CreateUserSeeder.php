<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'nama_users' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => '1',
            'is_active' => '1'
        ]);

      
    }
}
