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
        User::create([
            'name' => 'William Henrique',
            'email' => 'will@will.com',
            'password' => Hash::make('123456', ['rounds' => 10])
        ]);
        User::create([
            'name' => 'jose',
            'email' => 'jose@jose',
            'password' => Hash::make('123456', ['rounds' => 10])
        ]);
        User::create([
            'name' => 'maria',
            'email' => 'maria@maria',
            'password' => Hash::make('123456', ['rounds' => 10])
        ]);
        User::create([
            'name' => 'fernando',
            'email' => 'fer@fer',
            'password' => Hash::make('123456', ['rounds' => 10])
        ]);
        User::create([
            'name' => 'joana',
            'email' => 'joana@gmail',
            'password' => Hash::make('123456', ['rounds' => 10])
        ]);
        User::create([
            'name' => 'patricia',
            'email' => 'patricia@patricia',
            'password' => Hash::make('123456', ['rounds' => 10])
        ]);
        User::create([
            'name' => 'marcos',
            'email' => 'marcos@marcos',
            'password' => Hash::make('123456', ['rounds' => 10])
        ]);
    }
}
