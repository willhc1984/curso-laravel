<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Course;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    //Listar aulas
    public function index(Course $course){

        $classes = Classe::with('course')->where('course_id', 
            $course->id)->orderBy('order_classe')->get();

        // Carrega view
        return view('classes.index', ['classes' => $classes, 'course' => $course]);
    }

    //Detalhes da aula
    public function show(Request $request, Classe $classe){
        return view('classes.show', ['classe'=> $classe]);
    }

    //Carregar formulario cadastrar aula
    public function create(Course $course){
        //Carregar view
        return view('classes.create', ['course' => $course]);
    }

    public function store(Request $request) {

        //Recuperar ultima ordem de aula no curso
        $lastOrderClasse = Classe::where('course_id', $request->course_id)->orderByDesc('order_classe')->first();
        
        //Cadastrar no banco a aula
        Classe::create([
            'name' => $request->name,
            'descricao' => $request->descricao,
            'course_id' => $request->course_id,
            'order_classe' => $lastOrderClasse->order_classe +1
        ]);

        //Redireciona usuario, envia mensagem de sucesso
        return redirect()->route('classe.index', ['course' => $request->course_id])
            ->with('success', 'Aula cadastrada com sucesso!');
    }

}
