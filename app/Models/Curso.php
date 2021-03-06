<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['titulo', 'descricao'];

    public function matriculas(){
        return $this->belongsToMany('app/Models/Aluno','aluno_cursos');
    }
}
