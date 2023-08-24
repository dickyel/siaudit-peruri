<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class CreateRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::create([
            'nama_roles' => 'superadmin',
            
        ]);
        Role::create([
            'nama_roles' => 'admin_spi',
            
        ]);
        
        Role::create([
            'nama_roles' => 'auditee',
        ]);

        Role::create([
            'nama_roles' => 'pic',
        ]);

        Role::create([
            'nama_roles' => 'ka_spi',
        ]);

    }
}
