<?php

namespace App\Http\Controllers;

use App\Models\Aluno_Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matriculas = Aluno_Curso::all();
        return response($matriculas,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $aluno_id = $request->input('aluno_id');
        $curso_id = $request->input('curso_id');
        $data = new \DateTime();
        DB::insert('insert into aluno_cursos (aluno_id, curso_id, created_at, updated_at) values (?, ?, ?, ?)', [$aluno_id, $curso_id,$data,$data]);
        return response("Success",200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Aluno_Curso $id)
    {
        return response($id,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aluno_Curso $id)
    {
        $id->fill($request->all());
        $id->save();
        return response("Updated",200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aluno_Curso $id)
    {
        $id->delete();
        return response("Deleted",200);
    }
}
