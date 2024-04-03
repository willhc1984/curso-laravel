<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

class Course extends Model implements Auditable
{
    use HasFactory, AuditingAuditable;

    protected $table = 'courses';

    protected $fillable = ['name', 'price'];

    // Criar relacionamento um para muitos
    public function classe(){
        return $this->hasMany(Classe::class);
    }
    
}
