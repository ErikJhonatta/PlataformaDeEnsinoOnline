<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = Aluno::all();
        return response($alunos,200);
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

        $aluno = new Aluno();
        $aluno->fill($request->all());
        $time = strtotime($request->input('data_nasc'));
        $data = date('Y-m-d',$time);
        $aluno->data_nasc = $data;
        $aluno->save();

        return response("Success",201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Aluno $id)
    {
        if($id){
            return response($id,200);
        }
        return response('Not Found',404);
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
    public function update(Request $request, Aluno $id)
    {
        $id->fill($request->all());
        $time = strtotime($request->input('data_nasc'));
        $data = date('Y-m-d',$time);
        $id->data_nasc = $data;
        $id->save();
        return response("Updated",200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aluno $id)
    {
        $id->delete();
        return response("Deleted",200);
    }

    public function consultaNomeEmail(Request $request){
        $nome = $request->input('nome');
        $email = $request->input('email');
        $aluno = Aluno::where([
            ['nome', 'LIKE', '%'.$nome.'%'],
            ['email','LIKE', '%'.$email.'%']
        ])->get();
        if($aluno){
            return response($aluno,200);
        }
        return response("Not Found",404);
        
    }

    public function profiling(){
        $menores15 = Aluno::whereBetween(DB::raw('TIMESTAMPDIFF(YEAR,alunos.data_nasc,CURDATE())'),array(0,14))->count();
        $entre15e18 = Aluno::whereBetween(DB::raw('TIMESTAMPDIFF(YEAR,alunos.data_nasc,CURDATE())'),array(15,18))->count();
        $entre19e24 = Aluno::whereBetween(DB::raw('TIMESTAMPDIFF(YEAR,alunos.data_nasc,CURDATE())'),array(19,24))->count();
        $entre25e30 = Aluno::whereBetween(DB::raw('TIMESTAMPDIFF(YEAR,alunos.data_nasc,CURDATE())'),array(25,30))->count();
        $maior30 = Aluno::whereBetween(DB::raw('TIMESTAMPDIFF(YEAR,alunos.data_nasc,CURDATE())'),array(30,100))->count();
        return response()->json([
            "Menor que 15 anos"=> $menores15,
            "Entre 15 e 18 anos" => $entre15e18,
            "Entre 19 e 24 anos" => $entre19e24,
            "Entre 25 e 30 anos" => $entre25e30,
            "Maior que 30 anos" => $maior30,
        ]);
    }
}
