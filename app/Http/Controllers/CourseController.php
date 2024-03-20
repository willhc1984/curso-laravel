<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

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

    public function store(Request $request){
        //dd($request);
       $course =  Course::create(
            ['name' => $request->name]
        );
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
        $course->update(['name' => $request->name]);
        //Redirecionar usuario
        return redirect()->route('course.show', ['course' => $request->course])
            ->with('success', 'Curso editado com successo!');
    }

    public function destroy(Course $course){
        //Exclui regitro
        $course->delete();
        //Redireciona usuario
        return redirect()->route('course.index')->with('success','Curso deletado!');
    }

}
