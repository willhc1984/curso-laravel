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
            ['title' => 'Listar cursos', 'name' => 'index-course'], 
            ['title' => 'Visualizar curso', 'name' => 'show-course'],
            ['title' => 'Cadastrar cursos', 'name' => 'create-course'],
            ['title' => 'Editar cursos', 'name' => 'edit-course'],
            ['title' => 'Apagar cursos', 'name' => 'destroy-course'],

            ['title' => 'Listar usuários', 'name' => 'index-user'], 
            ['title' => 'Visualizar usuários', 'name' => 'show-user'],
            ['title' => 'Cadastrar usuários', 'name' => 'create-user'],
            ['title' => 'Editar usuários', 'name' => 'edit-user'],
            ['title' => 'Apagar usuários', 'name' => 'destroy-user'],

            ['title' => 'Listar aulas', 'name' => 'index-classe'], 
            ['title' => 'Visualizar aulas', 'name' => 'show-classe'],
            ['title' => 'Cadastrar aulas', 'name' => 'create-classe'],
            ['title' => 'Editar aulas', 'name' => 'edit-classe'],
            ['title' => 'Apagar aulas', 'name' => 'destroy-classe'],

            ['title' => 'Listar papéis', 'name' => 'index-role'], 
            ['title' => 'Visualizar papéis', 'name' => 'show-role'],
            ['title' => 'Cadastrar papéis', 'name' => 'create-role'],
            ['title' => 'Editar papéis', 'name' => 'edit-role'],
            ['title' => 'Apagar papéis', 'name' => 'destroy-role'],
        ];

        foreach($permissions as $permission){
            $existingPermission = Permission::where('name', $permission['name'])->first();

            if(!$existingPermission){
                Permission::create(['title' => $permission['title'], 'name' => $permission['name'], 'guard_name' => 'web']);
            }
        }
    }
}
