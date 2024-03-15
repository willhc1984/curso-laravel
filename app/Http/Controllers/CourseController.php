<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
   public function index(){
        return view('courses/index');
    }

    public function show(){
        return view('courses/show');
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
