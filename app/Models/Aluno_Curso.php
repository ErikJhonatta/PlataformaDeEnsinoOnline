<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno_Curso extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['aluno_id', 'curso_id'];

    protected $table =  'aluno_cursos';
}
