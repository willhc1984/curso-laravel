<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

class Classe extends Model implements Auditable
{
    use HasFactory, AuditingAuditable;

    protected $table = 'classes';

    protected $fillable = ['name', 'descricao', 'course_id', 'order_classe'];

    // Cria relacionamento um para muitos
    public function course(){
        return $this->belongsTo(Course::class);
    }
}
