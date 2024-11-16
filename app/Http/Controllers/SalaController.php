<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Departamento;
use App\Models\Sala;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    public function index(){
        $salas = Sala::paginate(10); // Use paginação em vez de `all`
        return view('salas.index', ['salas' => $salas]);
    }

    public function edit(Sala $sala){
        // Retorna a view de edição de um funcionário específico
        return view('salas.edit', ['sala'=>$sala]);
    }

    public function create(){
        // Busca todos os departamentos para exibir na lista de seleção
        $departamentos = Departamento::all();
    
        // Retorna a view de criação de um novo funcionário, com a variável $departamentos
        return view('salas.create', compact('departamentos')); 
    }

    public function show(Sala $sala){
         // Retorna a view de visualização de uma sala específica
         return view('salas.show', ['sala'=>$sala]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'id'=> 'required',
            'nome'=>'required',
            'numero'=> 'required',
            'departamentoID'=>'required',
            'departamento' => 'required',
        ]);
        $newSala = Sala::create($data);
        return redirect()->route('salas.index')->with('success', 'Sala criada com sucesso!');
    }
    
    
    public function update(Sala $sala, Request $request){
        // Lógica para atualizar um funcionário específico
        $data = $request->validate([
            'id'=> 'required',
            'nome'=>'required',
            'numero'=> 'required',
            'departamentoID'=>'required',
            'departamento' => 'required',
            ]);

        $sala->update($data);
        return redirect(route('salas.index'))->with('success', 'Sala atualizada com sucesso');
    }

    public function destroy(Sala $sala){
        // Lógica para deletar uma sala
        $sala->delete();
        return redirect(route('salas.index'))->with('success', 'Sala deletada com sucesso');
    }

}
