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
        // Exibe os dados recebidos do formulário
        //dd($request->all());
    
        // Lógica para validar os dados e salvar no banco de dados
        $data = $request->validate([
            'intermaritima_id' => 'required',
            'nome' => 'required',
            'cargo' => 'required',
            'is_admin' => 'required',
            'departamento_id' => 'required',
        ]);
    
        try {
            Funcionario::create($data);
            return redirect()->route('funcionarios.index')->with('success', 'Funcionário criado com sucesso!');
        } catch (\Illuminate\Database\QueryException $exception) {
                if ($exception->getCode() === '23000') { // Código para erro de chave duplicada
                    return back()
                        ->withErrors(['intermaritima_id' => 'O identificador informado já está em uso.'])
                        ->withInput();
                }
                throw $exception; // Repassa outras exceções não tratadas
            }
    }

    public function show(Funcionario $funcionario){
        // Retorna a view de visualização de um funcionário específico
        return view('funcionarios.show', ['funcionario'=>$funcionario]);
    }

    public function edit(Funcionario $funcionario){
        // Busca todos os departamentos para preencher o dropdown
        $departamentos = Departamento::all();
    
        // Retorna a view de edição com o funcionário e os departamentos
        return view('funcionarios.edit', compact('funcionario', 'departamentos'));
    }
    

    public function update(Funcionario $funcionario, Request $request){
        // Valida os dados do formulário
        $data = $request->validate([
            'intermaritima_id' => 'required',
            'nome' => 'required',
            'cargo' => 'required',
            'is_admin' => 'required',
            'departamento_id' => 'required',
        ]);
    
        try {
            // Tenta atualizar o funcionário
            $funcionario->update($data);
            return redirect()->route('funcionarios.index')->with('success', 'Funcionário atualizado com sucesso!');
        } catch (\Illuminate\Database\QueryException $exception) {
            // Verifica se o erro é uma violação de chave única
            if ($exception->getCode() === '23000') {
                return back()->withErrors(['intermaritima_id' => 'Já existe um funcionário com este identificador.'])->withInput();
            }
    
            // Lança a exceção para outros erros não tratados
            throw $exception;
        }
    }

    public function destroy(Funcionario $funcionario){
        // Lógica para deletar um funcionário
        $funcionario->delete();
        return redirect(route('funcionarios.index'))->with('success', 'Product Updated Succesffully');
    }
}
