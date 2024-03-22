<?php

namespace Database\Seeders;

use App\Models\Classe;
use Illuminate\Database\Seeder;

class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!Classe::where('name', 'Aula 1')){
            Classe::create([
                'name' => 'Aula 1',
                'descricao' => 'Introdução',
                'course_id' => 5
            ]);
        }

        if(!Classe::where('name', 'Aula 1')){
            Classe::create([
                'name' => 'Aula 1',
                'descricao' => 'Introdução',
                'course_id' => 5
            ]);
        }

        if(!Classe::where('name', 'Aula 1')){
            Classe::create([
                'name' => 'Aula 1',
                'descricao' => 'Introdução',
                'course_id' => 3
            ]);
        }
        
    }
}
