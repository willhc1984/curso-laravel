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

    public function show(Request $request){

        // Recuperar informações do BD
        $course = Course::where('id', $request->courseId)->first();
        
        // Carregar view
        return view('courses/show', ['course' => $course]);
    }

    public function create(){
        return view('courses/create');
    }

    public function store(Request $request){
        //dd($request);
        Course::create(
            ['name' => $request->name]
        );
        return redirect()->route('course.show')->with('success','Curso cadastrado com sucesso!');
    }

    public function edit(){
        return view('courses/edit');
    }

    public function update(){
        dd('Curso atualizado');
    }

    public function destroy(){
        dd('Curso excluido');
    }

}
