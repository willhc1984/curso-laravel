<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
{

    //Executar construct quando instanciar a classe
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('permission:index-course', ['only' => ['index']]);
        $this->middleware('permission:show-course', ['only' => ['show']]);
        $this->middleware('permission:create-course', ['only' => ['create']]);
        $this->middleware('permission:edit-course', ['only' => ['edit']]);
        $this->middleware('permission:destroy-course', ['only' => ['destroy']]);
    }

    //Listar os cursos
   public function index(){
        $cursos = Course::orderByDesc('created_at')->paginate(5);
        //dd($cursos);
        return view('courses.index', ['menu' => 'courses', 'courses' => $cursos]);
    }

    public function show(Request $request, Course $course){
        // Recuperar informações do BD
        return view('courses/show', ['menu' => 'courses', 'course' => $course]);
    }

    public function create(){
        return view('courses.create', ['menu' => 'courses']);
    }

    public function store(CourseRequest $request){
        //Validação dos campos do formulario.
        $request->validated();

        //Marca ponto inicial da transação
        DB::beginTransaction();

        try{
            //Cadastrar no banco de dados
            $course =  Course::create([
                'name' => $request->name, 
                'price' => str_replace(',', '.', str_replace('.', '', $request->price))
            ]);

            //Salvando log
            Log::info('Curso gravado com sucesso!', [$course]);

            //Operação concluida com exito
            DB::commit();
            
            return redirect()->route('course.show', ['menu' => 'courses', 'course' => $course->id])
                ->with('success','Curso cadastrado com sucesso!');

        } catch (Exception $e){
            //Operação não concluida
            DB::rollBack();

            //Salvando log
            Log::warning('Curso não gravado!', ['error' => $e->getMessage()]);
            
            return back()->withInput()->with('error','Curso não cadastrado!');
        }        
    }

    public function edit(Request $request, Course $course){
        //Retorno para View
        return view('courses/edit', ['menu' => 'courses', 'course' => $course]);
    }

    public function update(CourseRequest $request, Course $course){
        //Validação dos campos do formulario.
        $request->validated();

        //Marca ponto inicial da transação
        DB::beginTransaction();

        try{
            //Atualiza no banco de dados
            $course->update([
                'name' => $request->name, 
                'price' => str_replace(',', '.', str_replace('.', '', $request->price))
            ]);

            //Operação concluida com exito
            DB::commit();

            //Salvando log de sucesso
            Log::info('Curso editado com sucesso!');

            //Redirecionar usuario
            return redirect()->route('course.show', ['menu' => 'courses', 'course' => $request->course])
                ->with('success', 'Curso atualizado com successo!');

        }catch(Exception $e){
            //Operação não concluida
            DB::rollBack();
            //Salvando log
            Log::warning('Curso não atualizado!', ['error' => $e->getMessage()]);
            //Retorno com mensagem de erro
            return back()->withInput()->with('error','Curso não atualizado!');
        }
    }

    public function destroy(Course $course){
        //Exclui regitro
        try {       
            $course->delete();
            //Salvando log de sucesso
            Log::info('Curso excluido com sucesso!');
            //Redireciona usuario com msg de successo
            return redirect()->route('course.index')->with('success','Curso deletado!');
        }catch(Exception $e){
            //Salvando log de erro
            Log::warning('Curso nao pode ser excluido!');
            //Redireciona usuario com mensagem de erro
            return redirect()->route('course.index')->with('error','Curso não excluido! Possui aulas cadastradas.');
        }
    }

}
