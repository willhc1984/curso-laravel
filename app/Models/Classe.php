<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $fillable = ['name', 'descricao', 'course_id', 'order_classe'];

    // Cria relacionamento um para muitos
    public function course(){
        return $this->belongsTo(Course::class);
    }
}
