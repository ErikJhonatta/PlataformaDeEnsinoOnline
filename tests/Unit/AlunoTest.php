<?php

namespace Tests\Unit;

use App\Models\Aluno;
use Tests\TestCase;

class AlunoTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    public function testAlunoCreate(){
        $aluno = new Aluno();
        $aluno->nome = "UnitTestUnit";
        $aluno->email = "exampleTest@email.com";
        $aluno->sexo = "Feminino";
        $time = strtotime("05/10/1998");
        $data = date('Y-m-d',$time);
        $aluno->data_nasc = $data;
        $aluno->save();

        $this->assertTrue(True); //Se chega aqui, o save foi bem sucedido

    }

    public function testAlunoEdit(){
        $aluno = Aluno::where('nome','=','UnitTestUnit')->update(['nome' => 'UnitTest']);

        $aluno = Aluno::where('nome','=','UnitTest')->first();
        $this->assertEquals('UnitTest',$aluno->nome);
    }

    public function testAlunoDelete(){
        $aluno = Aluno::where('nome','=','UnitTest');
        $aluno->delete();

        $this->assertTrue(True);
    }

    
}
