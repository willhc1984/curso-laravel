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
            'index-course',
            'show-course',
            'create-course',
            'edit-course',
            'destroy-course'
        ];

        foreach($permissions as $permission){
            $existingPermission = Permission::where('name', $permission)->first();

            if(!$existingPermission){
                Permission::create(['name' => $permission, 'guard_name' => 'web']);
            }
        }
    }
}
