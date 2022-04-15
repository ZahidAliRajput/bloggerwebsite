<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Roles = [
            // Create Few Roles
            ['name' => 'Admin', 'guard_name'=>'web'],
            ['name' => 'Publisher', 'guard_name'=>'web'],
        ];
        foreach($Roles as $Role){
            Role::create($Role);
        }
    }
}
