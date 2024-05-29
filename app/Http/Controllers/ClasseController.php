<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClasseRequest;
use App\Models\Classe;
use App\Models\Course;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClasseController extends Controller
{
    //Listar aulas
    public function index(Course $course){
        //Busca aulas no banco de dados
        $classes = Classe::with('course')->where('course_id', 
            $course->id)->orderBy('order_classe')->get();

        // Carrega view
        return view('classes.index', ['menu' => 'courses', 'classes' => $classes, 'course' => $course]);
    }

    //Detalhes da aula
    public function show(Classe $classe){
        return view('classes.show', ['menu' => 'courses', 'classe'=> $classe]);
    }

    //Carregar formulario cadastrar aula
    public function create(Course $course){
        //Carregar view
        return view('classes.create', ['menu' => 'courses', 'course' => $course]);
    }

    public function store(ClasseRequest $request) {
        //Validação dos campos do formulario
        $request->validated();

        //Inicio da transação
        DB::beginTransaction();

        try{
             //Recuperar ultima ordem de aula no curso
            $lastOrderClasse = Classe::where('course_id', $request->course_id)->orderByDesc('order_classe')->first();

            //Cadastrar aula no banco a aula
            Classe::create([
                'name' => $request->name,
                'descricao' => $request->descricao,
                'course_id' => $request->course_id,
                'order_classe' => $lastOrderClasse->order_classe + 1
            ]);

            //Salvando log de sucesso
            Log::info('Aula cadastrada com sucesso!');

            //Transação com sucesso
            DB::commit();

            //Redireciona usuario, envia mensagem de sucesso
            return redirect()->route('classe.index', ['course' => $request->course_id])
                ->with('success', 'Aula cadastrada com sucesso!');

        }catch(Exception $e){
            //Salvar log com erro
            Log::warning('Aula não cadastrada.', ['erro' => $e->getMessage()]);

            //Transação não concluida
            DB::rollBack();
            
            //Redireciona usuario, envia mensagem de erro
            return redirect()->back()->with('error', 'Aula não cadastrada!');            
        }       
    }

    public function edit(Classe $classe){
        //Carregar view
        return view('classes.edit', ['menu' => 'courses', 'classe' => $classe]);
    }

    public function update(ClasseRequest $request, Classe $classe){
        //Valida formulario
        $request->validated();

        //Inicio da transação
        DB::beginTransaction();

        try{
            //Editar as informações do registro
            $classe->update([
                'name' => $request->name,    
                'descricao' => $request->descricao,
            ]);

            //Transação com sucesso
            DB::commit();

            //Salvando log de sucesso
            Log::info('Aula atualizada com sucesso!');

            //Redireciona e envia mensagem de sucesso
            return redirect()->route('classe.index', ['course' => $classe->course_id])
                ->with('success', 'Aula atualizada com sucesso!');
            }
        catch(Exception $e){
             //Salvar log com erro
             Log::warning('Aula não atualizada.', ['erro' => $e->getMessage()]);

             //Transação não concluida
             DB::rollBack();
             
             //Redireciona usuario, envia mensagem de erro
             return redirect()->back()->with('error', 'Aula não atualizada!');
        }
    }

    public function destroy(Classe $classe){

        try{
            //Excluir registro do banco de dados
            $classe->delete();

            //Salvando log de sucesso
            Log::info('Aula excluida com sucesso!');

            //Redireciona o usuario
            return redirect()->route('classe.index', ['course' => $classe->course_id])->with
                ('success','Aula excluida com sucesso!');

        }catch(Exception $e){
            //Salvar log com erro
            Log::warning('Aula não excluida.', ['erro' => $e->getMessage()]);
            
            //Redireciona usuario, envia mensagem de erro
            return redirect()->back()->with('error', 'Aula não excluida!');
        }
       
    }

}
