<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    { 
        
        $superAdmin = User::create([
            'name' => 'William Henrique',
            'email' => 'will@will.com',
            'password' => Hash::make('123456', ['rounds' => 10])
        ]);

        $superAdmin->assignRole('Super Admin');

        $professor = User::create([
            'name' => 'jose',
            'email' => 'jose@jose',
            'password' => Hash::make('123456', ['rounds' => 10])
        ]);

        $professor->assignRole('Professor');

        User::create([
            'name' => 'maria',
            'email' => 'maria@maria',
            'password' => Hash::make('123456', ['rounds' => 10])
        ]);

        $tutor = User::create([
            'name' => 'fernando',
            'email' => 'fer@fer',
            'password' => Hash::make('123456', ['rounds' => 10])
        ]);

        $tutor->assignRole('Tutor');

        $tutor2 = User::create([
            'name' => 'joana',
            'email' => 'joana@gmail',
            'password' => Hash::make('123456', ['rounds' => 10])
        ]);

        $tutor2->assignRole('Tutor');

        $aluno = User::create([
            'name' => 'patricia',
            'email' => 'patricia@patricia',
            'password' => Hash::make('123456', ['rounds' => 10])
        ]);

        $aluno->assignRole('Aluno');

        $aluno2 = User::create([
            'name' => 'marcos',
            'email' => 'marcos@marcos',
            'password' => Hash::make('123456', ['rounds' => 10])
        ]);

        $aluno2->assignRole('Aluno');
    }
}
