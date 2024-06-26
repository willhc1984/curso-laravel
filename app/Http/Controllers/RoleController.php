<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //Executar o construct quando instanciar a classe - verifica permissão de quem esta logado
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('permission:index-role', ['only' => ['index']]);
        $this->middleware('permission:create-role', ['only' => ['create']]);
        $this->middleware('permission:store-role', ['only' => ['store']]);
        $this->middleware('permission:edit-role', ['only' => ['edit']]);
        $this->middleware('permission:destroy-role', ['only' => ['destroy']]);
        $this->middleware('permission:index-permission', ['only' => ['index']]);
    }

    //Listar os papeis
    public function index(){
        //Recuperar os registros do banco de dados
        $roles = Role::orderByDesc('name')->paginate(40);

        //Salvar log
        Log::info('Listar papeis', ['action_user_id' => Auth::id()]);

        //Carrega a view
        return view('roles.index', ['menu' => 'roles', 'roles' => $roles]);
    }

    //Abrir formulario de editar
    public function edit(Role $role){
        //Carrega a view
        return view('roles.edit', ['menu' => 'roles', 'role' => $role]);
    }

    //Atualiza papel no bancode dados
    public function update(RoleRequest $request, Role $role){
        //Validação do formulario
        $request->validated();
        //Marca inicio da transação
        DB::beginTransaction();

        try{
            $role->update([
                'name' => $request->name,
            ]);

            //Operação concluida com exito
            DB::commit();
            //Salva log de exito
            Log::info('Papel editado', ['id' => $role->id, 'action_user_id' => Auth::id()]);
            //Redireciona com mensagme de sucesso
            return redirect()->route('role.index', ['menu' => 'roles', 'role' => $request->role])
                ->with('success', 'Papel editado!');
                
        }catch(Exception $e){
            //Operação não concluida
            DB::rollBack();
            //Salvando log de erro
            Log::warning('Papel não foi editado.', ['id' => $role->id, 'action_user_id' => Auth::id()]);
            //Redireciona com mensagem de erro
            return back()->withInput()->with('error', 'Papel não editado! Tente novamente.');
        }
    }

    //Carrega tela de cadastro de papeis
    public function create() {
        return view('roles.create', ['menu' => 'roles']);
    }

    //Salva role no banco de ddos
    public function store(RoleRequest $request){
        //Validação dos campos do formulario
        $request->validated();

        //Inicio da transação
        DB::beginTransaction();

        try{
            //Cadastrar o banco de dados
            $role = Role::create([
                'name' => $request->name,
            ]);

            //Salvar log
            Log::info('Papel gravado com sucesso!', ['id' => $role->id, 'action_user_id' => Auth::id()]);

            //Operação concluida com exito
            DB::commit();

            //Redireciona com mensagem de sucesso
            return redirect()->route('role.index')->with('success', 'Papel cadastrado com sucesso!');

        }catch(Exception $e){
            //Salva log
            Log::info('Papel não cadastrado.', ['error' => $e->getMessage(), 'action_user_id' => Auth::id()]);

            //Operação não concluida com exito
            DB::rollBack();

            //Redireciona usuario e envia mensagem de erro
            return back()->withInput()->with('error', 'Papel não cadastrado.');
        }     
    }

    //Exclui papel no banco de dados
    public function destroy(Role $role){
        //Não permitir excluir super admin
        if($role->name == "Super Admin"){
            Log::warning('Papel Super Admin não pode ser excluido.', ['papel_id' => $role->id, 'action_user_id' => Auth::id()]);
            //Redireciona usuario com msg de successo
            return redirect()->route('role.index')->with('error','Papel Super Admin não pode ser excluido!');
        }
        //Não permitir excluir papel com ususario associado
        if($role->users->isNotEmpty()){
            //Salva no log
            Log::warning('Papel possiu ususarios associados.', ['papel_id' => $role->id, 'action_user_id' => Auth::id()]);
            //Redireciona usuario com msg de successo
            return redirect()->route('role.index')->with('error','Papel não pode ser exluido pois possui usuários associados.');
        }
        //Exluir registro
        try{
            $role->delete();
            //Salvando log
            Log::info('Curso excluido com sucesso.', ['id' => $role->id, 'action_user_id' => Auth::id()]);
            //Redireciona usuario com msg de successo
            return redirect()->route('role.index')->with('success','Papel deletado!');
        }catch(Exception $e){
             //Salvando log de erro
             Log::warning('Papel não excluido com sucesso.', ['id' => $role->id, 'action_user_id' => Auth::id()]);
             //Redireciona com mensagemde erro
             return redirect()->route('role.index')->with('erro', 'Papel não excluido.');
        }
    }
}
