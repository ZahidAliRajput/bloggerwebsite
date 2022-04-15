<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            // Role Module Permissions
            ['name'=>'role_view', 'guard_name'=>'web'],
            ['name'=>'role_add', 'guard_name' => 'web'],
            ['name'=>'role_edit', 'guard_name'=>'web'],
            ['name'=>'role_delete', 'guard_name'=>'web'],
            ['name'=>'role_has_permission', 'guard_name'=>'web'],
            
            // Permission Module Permissions
            ['name'=>'permission_view', 'guard_name'=>'web'],
            ['name'=>'permission_add', 'guard_name'=>'web'],
            ['name'=>'permission_edit', 'guard_name'=>'web'],
            ['name'=>'permission_delete', 'guard_name'=>'web'],
            // User Module Permission
            ['name'=>'user_view', 'guard_name'=>'web'],
            ['name'=>'user_add', 'guard_name'=>'web'],
            ['name'=>'user_edit', 'guard_name'=>'web'],
            ['name'=>'user_delete', 'guard_name'=>'web'],
            ['name'=>'user_has_permission', 'guard_name'=>'web'],

            // Category Module Permission
            ['name'=>'category_view', 'guard_name'=>'web'],
            ['name'=>'category_add', 'guard_name'=>'web'],
            ['name'=>'category_edit', 'guard_name'=>'web'],
            ['name'=>'category_delete', 'guard_name'=>'web'],
            
            // Post Module Permission
            ['name'=>'post_view', 'guard_name'=>'web'],
            ['name'=>'post_add', 'guard_name'=>'web'],
            ['name'=>'post_edit', 'guard_name'=>'web'],
            ['name'=>'post_delete', 'guard_name'=>'web'],
            

    
        ];
        foreach($permissions as $permission)
        {
          Permission::create($permission);
        }
    }
}
