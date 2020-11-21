<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nome','email','sexo','data_nasc'];

    public function matriculas(){
        return $this->belongsToMany('app/Models/Curso','aluno_cursos');
    }

}
