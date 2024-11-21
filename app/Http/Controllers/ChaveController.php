<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chave;
use App\Models\Funcionario;
use App\Models\Sala;

class ChaveController extends Controller
{
    public function index(){
        // Retorna a view de listagem de chaves
        $chave = Chave::paginate(10);
        return view('chaves.index', ['chaves'=>$chave]);
    }

    public function create(){
        $funcionarios = Funcionario::all();
        $salas = Sala::all(); // Busca todas as chaves
        return view('chaves.create', compact('funcionarios', 'salas'));
    }

    public function store(Request $request){
        // Lógica para salvar uma nova chave no banco de dados
       
        $data = $request->validate([
                'intermaritima_id'=> 'required',
                'salaID'=>'required',
                'sala'=>'required',
                'is_locado'=> 'required',
                'funcionarioID'=>'required',
                'funcionario' => 'required',
                ]);

        $newChave = Chave::create($data); 
        return redirect()->route('chaves.index')->with('success', 'Funcionário criado com sucesso!'); // Redireciona para a lista de funcionários
    }

    public function show(Chave $chave){
        // Retorna a view de visualização de uma chave específica
        return view('chaves.show', ['chave'=>$chave]);
    }

    public function edit(Chave $chave){
        // Retorna a view de edição de uma chave específica
        return view('chaves.edit', ['chave'=>$chave]);
    }

    public function update(Chave $chave, Request $request){
        // Lógica para atualizar uma chave específica
        $data = $request->validate([
            'intermaritima_id'=> 'required',
            'salaID'=>'required',
            'sala'=>'required',
            'is_locado'=> 'required',
            'funcionarioID'=>'required',
            'funcionario' => 'required',
            ]);

        $chave->update($data);
        return redirect(route('chaves.index'))->with('success', 'Product Updated Succesffully');
    }

    public function destroy(Chave $chave){
        // Lógica para deletar uma chave
        $chave->delete();
        return redirect(route('chaves.index'))->with('success', 'Product Updated Succesffully');
    }
}
