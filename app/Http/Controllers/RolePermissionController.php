<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    //Listar permissões do papel
    public function index(Role $role)
    {

        //Verificar se é super admin, não permitir visualizar as permissões
        if ($role->name == 'Super Admin') {
            //Salvar log
            Log::warning('Pemissãoes de super admin não podem ser acessadas!', ['action_user_id' => Auth::id()]);
            //Redirecionar com mensagem de erro
            return redirect()->route('role.index')->with('error', 'Permissão do super admin não pode ser acessada!');
        }

        //Recuperar pemissões do papel
        $rolePermissions = DB::table('role_has_permissions')->where('role_id', $role->id)
            ->pluck('permission_id')
            ->all();

        //Recuperar permissões
        $permissions = Permission::get();

        //Salvar log
        Log::info('Listar pemrissões do papel', ['papel_id' => $role->id, 'action_user_id' => Auth::id()]);

        //Carregar view
        return view('rolesPermission.index', [
            'menu' => 'roles',
            'rolePermissions' => $rolePermissions,
            'permissions' => $permissions,
            'role' => $role,
        ]);
    }

    //Editar a permissão de acesso do papel
    public function update(Request $request, Role $role)
    {
        //Obter a permissão especifica com base no ID fornecido em $request->permission        
        $permission = Permission::find($request->permission);

        //Verificar se permissão foi encontrada
        if (!$permission) {
            return redirect()->route('role-permission.index', ['role' => $role->id])->with('error', 'Permissão não encontrada!');
        } 

        //Verificar se a permissão ja esta associada ao papel
        if($role->permissions->contains($permission)){
            //Remove a permissão do papel (Bloquear)
            $role->revokePermissionTo($permission);
            //Salvar log
            Log::info('Bloquear permissão para o papel.', ['action_user_id' => Auth::id(), 'permissao' => $request->permission]);
            //Redirecionar o ussuario e enviar mensagem de sucesso
            return redirect()->route('role-permission.index', ['role' => $role->id])->with('success', 'Permissão bloqueada!');
        }else{
            //Atribui permissão ao papel
            $role->givePermissionTo($permission);
            //Salvar no log
            Log::info('Permissão atribuida ao papel.', ['action_user_id' => Auth::id(), 'permissao' => $request->permission]);
            //Redireciona com mensgame de sucesso
            return redirect()->route('role-permission.index', ['role' => $role->id])->with('success', 'Permissão autorizada!');
        }
    }
}
