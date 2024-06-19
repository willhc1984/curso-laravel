<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!Role::where('name', 'Super Admin')->first()){
            Role::create([
                'name' => 'Super Admin'
            ]);
        }

        //Atribuir permissão para o papel
        if(!Role::where('name', 'Admin')->first()){
            $admin = Role::create([
                'name' => 'Admin'
            ]);

            $admin->givePermissionTo([
                'index-course', 'index-user', 'index-classe',
                'show-course', 'show-user', 'show-classe',
                'create-course', 'create-user', 'create-classe',
                'edit-course', 'edit-user', 'edit-classe',
                'destroy-course', 'destroy-user', 'destroy-classe',
            ]);
        }

        //Atribuir permissão para o papel
        if(!Role::where('name', 'Professor')->first()){
            $professor = Role::create([
                'name' => 'Professor'
            ]);

            $professor->givePermissionTo([
                'index-course',
                'show-course',
                'create-course',
                'edit-course',
                'destroy-course'
            ]);
        }

        //Atribuir permissão para o papel
        if(!Role::where('name', 'Tutor')->first()){
            $tutor = Role::create([
                'name' => 'Tutor'
            ]);

            $tutor->givePermissionTo([
                'index-course',
                'show-course',
            ]);
        }

        //Atribuir permissão para o papel
        if(!Role::where('name', 'Aluno')->first()){
            $aluno = Role::create([
                'name' => 'Aluno',
            ]);

            $aluno->givePermissionTo([
                'index-course',
                'show-course',
            ]);
        }
    }
}
