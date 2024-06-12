<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

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
            'index-course', 'index-user', 
            'show-course', 'show-user',
            'create-course', 'create-user',
            'edit-course', 'edit-user',
            'destroy-course', 'destroy-user',

            'index-classe',
            'show-classe',
            'create-classe',
            'edit-classe',
            'destroy-classe'
        ];

        foreach($permissions as $permission){
            $existingPermission = Permission::where('name', $permission)->first();

            if(!$existingPermission){
                Permission::create(['name' => $permission, 'guard_name' => 'web']);
            }
        }
    }
}
