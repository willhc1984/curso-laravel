<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteUri;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //Executar o construct quando instanciar a classe - verifica permissão de quem esta logado
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('permission:create-permission', ['only' => ['create']]);
        $this->middleware('permission:destroy-permission', ['only' => ['destroy']]);
    }

    //Listar permissões cadastradas
    public function index(){
        //Recuperar registros do banco de dados
        $permissions = Permission::orderBy('id')->paginate(10);
        //Salvar no log
        Log::info('Listar permissões', ['action_user_id' => Auth::id()]);
        //Carrega a view
        return view('permissions.index', [
            'menu' => 'permissions', 
            'permissions' => $permissions
        ]);
    }

    //Carrega view de cadastrar permissão
    public function create() {
        //Carrega view para cadastrar
        return view('permissions.create');
    }

    //Cadastrar permissão no banco de dados
    public function store(PermissionRequest $request){
        //Validação dos dados so formulário
        $request->validated();

        //Inicio da transação
        DB::beginTransaction();

        try{
            $permission = Permission::create([
                'title' => $request->title,
                'name' => $request->name,
            ]);

            //Salvar no log
            Log::info('Pemissão gravada com sucesso!', ['id' =>$permission->id, 'action_user_id' => Auth::id()]);

            //Operação concluida com exito
            DB::commit();

            //Redireciona com mensagem de sucesso
            return redirect()->route('permissions.index')->with('success', 'Permissão cadastrada com sucesso!');
            
        }catch(Exception $e){
            //Salva log de erro
            Log::warning('Permissão não foi salva', ['error' => $e->getMessage(), 'action_user_id' => Auth::id()]);
             //Operação não concluida
             DB::rollBack();
             //Redireciona com mensagem de erro
             return back()->withInput()->with('error', 'Permissão não criada!');
        }
    }

    //Excluir permissão
    public function destroy(Permission $permission){
        try{
            $permission->delete();
            //Salavndo no log
            Log::info('Permissão excluida com sucesso!', ['id' => $permission->id, 'action_user_id' => Auth::id()]);
            //Redireciona com mensagem de sucesso
            return redirect()->route('permissions.index')->with('success', 'Permissão excluida com sucesso!');
        }catch(Exception $e){
            //Salvando log de erro
            Log::warning('Permissão não excluida com sucesso.', ['id' => $permission->id, 'action_user_id' => Auth::id()]);
            //Redireciona com mensagemde erro
            return redirect()->route('permissions.index')->with('erro', 'Papel não excluido.');
        }
    }
}
