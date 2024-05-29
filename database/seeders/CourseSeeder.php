<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'name' => "Laravel 10",
            'price' => "89.90",
        ]);

        Course::create([
            'name' => "SQL Server 10",
            'price' => "189.90",
        ]);

        Course::create([
            'name' => "Java 8",
            'price' => "289.90",
        ]);

        Course::create([
            'name' => "PHP 8",
            'price' => "289.90",
        ]);
    }
}
