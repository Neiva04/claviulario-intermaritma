<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Models\Departamento;
class FuncionarioController extends Controller
{
    public function index(){
        // Retorna a view de listagem de funcionários
        $funcionarios = Funcionario::paginate(10);
        return view('funcionarios.index', ['funcionarios'=>$funcionarios]);
    }

    public function create(){
        // Busca todos os departamentos para exibir na lista de seleção
        $departamentos = Departamento::all();
    
        // Retorna a view de criação de um novo funcionário, com a variável $departamentos
        return view('funcionarios.create', compact('departamentos'));
    }

    public function store(Request $request){
        // Lógica para salvar um novo funcionário no banco de dados
       
        $data = $request->validate([
                'intermaritima_id'=> 'required',
                'nome'=>'required',
                'cargo'=> 'required',
                'isAdmin'=> 'required',
                'departamentoID'=>'required',
                'departamento' => 'required',
                ]);

        $newFuncionario = Funcionario::create($data); 
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário criado com sucesso!'); // Redireciona para a lista de funcionários
    }

    public function show(Funcionario $funcionario){
        // Retorna a view de visualização de um funcionário específico
        return view('funcionarios.show', ['funcionario'=>$funcionario]);
    }

    public function edit(Funcionario $funcionario){
        // Retorna a view de edição de um funcionário específico
        return view('funcionarios.edit', ['funcionario'=>$funcionario]);
    }

    public function update(Funcionario $funcionario, Request $request){
        // Lógica para atualizar um funcionário específico
        $data = $request->validate([
            'intermaritima_id'=> 'required',
            'nome'=>'required',
            'cargo'=> 'required',
            'isAdmin'=> 'required',
            'departamentoID'=>'required',
            'departamento' => 'required',
            ]);

        $funcionario->update($data);
        return redirect(route('funcionarios.index'))->with('success', 'Product Updated Succesffully');
    }

    public function destroy(Funcionario $funcionario){
        // Lógica para deletar um funcionário
        $funcionario->delete();
        return redirect(route('funcionarios.index'))->with('success', 'Product Updated Succesffully');
    }
}
