<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = ['name', 'price'];

    // Criar relacionamento um para muitos
    public function classe(){
        return $this->hasMany(Classe::class);
    }
    
}
