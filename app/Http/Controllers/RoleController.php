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
}
