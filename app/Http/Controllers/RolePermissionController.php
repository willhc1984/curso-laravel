<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    //Listar permissões do papel
    public function index(Role $role){

        //Verificar se é super admin, não permitir visualizar as permissões
        if($role->name == 'Super Admin'){
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
            'permissions' => $permissions
        ]);        
    }

}
