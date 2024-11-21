<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Departamento;

class DepartamentoController extends Controller
{
    public function index(){
        // Retorna a view de listagem de departamentos
        $departamentos = Departamento::paginate(10);
        return view('departamentos.index', ['departamentos'=>$departamentos]);
    }

    public function create(){
        // Busca todos os departamentos para exibir na lista de seleção
        $departamentos = Departamento::all();
    
        // Retorna a view de criação de um novo departamento
        return view('departamentos.create', compact('departamentos'));
    }

    public function store(Request $request){
        // Lógica para salvar um novo departamento no banco de dados
       
        $data = $request->validate([
                'nome'=>'required',
                ]);

        $newDepartamento = Departamento::create($data); 
        return redirect()->route('departamentos.index')->with('success', 'Funcionário criado com sucesso!'); // Redireciona para a lista de funcionários
    }

    public function show(Departamento $departamento){
        // Retorna a view de visualização de um departamento específico
        return view('departamentos.show', ['departamento'=>$departamento]);
    }

    public function edit(Departamento $departamento){
        // Retorna a view de edição de um departamento específico
        return view('departamentos.edit', ['departamentos'=>$departamento]);
    }

    public function update(Departamento $departamento, Request $request){
        // Lógica para atualizar um departamento específico
        $data = $request->validate([
            'nome'=>'required',
            ]);

        $departamento->update($data);
        return redirect(route('departamentos.index'))->with('success', 'Product Updated Succesffully');
    }

    public function destroy(Departamento $departamento){
        // Lógica para deletar um departamento
        $departamento->delete();
        return redirect(route('departamentos.index'))->with('success', 'Product Updated Succesffully');
    }
}
