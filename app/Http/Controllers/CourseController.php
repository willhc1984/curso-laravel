<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
{
   public function index(){
        $cursos = Course::orderByDesc('created_at')->paginate(5);
        //dd($cursos);
        return view('courses/index', ['courses' => $cursos]);
    }

    public function show(Request $request, Course $course){

        // Recuperar informações do BD
        //$course = Course::where('id', $request->course)->first();
        
        // Carregar view
        return view('courses/show', ['course' => $course]);
    }

    public function create(){
        return view('courses/create');
    }

    public function store(CourseRequest $request){
        //Validação dos campos do formulario.
        $request->validated();
        //dd($request);
        $course =  Course::create([
            'name' => $request->name, 
            'price' => $request->price
        ]);

        //Salvando log
        Log::info('Curso gravado com sucesso!', [$course]);
        
        return redirect()->route('course.show', ['course' => $course->id])
            ->with('success','Curso cadastrado com sucesso!');
        
    }

    public function edit(Request $request, Course $course){

        //$course = Course::where('id', $request->course)->first();
        //dd($course);

        return view('courses/edit', ['course' => $course]);
    }

    public function update(Request $request, Course $course){
        
        //Atualiza no banco de dados
        $course->update([
            'name' => $request->name, 
            'price' => $request->price
        ]);

        //Salvando log de sucesso
        Log::info('Curso editado com sucesso!');

        //Redirecionar usuario
        return redirect()->route('course.show', ['course' => $request->course])
            ->with('success', 'Curso atualizado com successo!');
    }

    public function destroy(Course $course){
        //Exclui regitro
        try {       
            $course->delete();
            //Salvando log de sucesso
            Log::info('Curso excluida com sucesso!');
            //Redireciona usuario com msg de successo
            return redirect()->route('course.index')->with('success','Curso deletado!');
        }catch(Exception $e){
            //Salvando log de erro
            Log::info('Aula nao pode ser excluida!');
            //Redireciona usuario com mensagem de erro
            return redirect()->route('course.index')->with('error','Curso não excluido! Possui aulas cadastradas.');
        }
    }

}
