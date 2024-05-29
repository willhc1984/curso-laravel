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
        if(!Classe::where('name', 'Aula 1')->first()){
            Classe::create([
                'name' => 'Aula 1',
                'descricao' => 'Introdução',
                'order_classe' => 1,
                'course_id' => 1
            ]);
        }

        if(!Classe::where('name', 'Aula 2')->first()){
            Classe::create([
                'name' => 'Aula 2',
                'descricao' => 'Introdução 2',
                'order_classe' => 2,
                'course_id' => 1
            ]);
        }

        if(!Classe::where('name', 'Aula 3')->first()){
            Classe::create([
                'name' => 'Aula 3',
                'descricao' => 'Introdução 3',
                'order_classe' => 3,
                'course_id' => 2
            ]);
        }
        
    }
}
