<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Course;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    //Listar aulas
    public function index(Course $course){
        
        $classes = Classe::with('course')->where('course_id', $course->id)->get();

        // Carrega view
        return view('classes.index', ['classes' => $classes]);
    }
}
