<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Departamento;
use App\Models\Sala;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    public function index(){
        // Retorna a view de listagem de salas
        $salas = Sala::paginate(10);
        return view('salas.index', ['salas' => $salas]);
    }

    public function edit(Sala $sala){
        // Busca todos os departamentos para preencher o dropdown
        $departamentos = Departamento::all();
    
        // Retorna a view de edição com o funcionário e os departamentos
        return view('salas.edit', compact('sala', 'departamentos'));
    }

    public function create(){
        // Busca todos os departamentos para exibir na lista de seleção
        $departamentos = Departamento::all();
    
        // Retorna a view de criação de uma nova sala, com a variável $departamentos
        return view('salas.create', compact('departamentos')); 
    }

    public function show(Sala $sala){
         // Retorna a view de visualização de uma sala específica
         return view('salas.show', ['sala'=>$sala]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'nome'=>'required',
            'numero'=>'nullable',
            'departamento_id'=>'required',
        ]);
        $newSala = Sala::create($data);
        return redirect()->route('salas.index')->with('success', 'Sala criada com sucesso!');
    }
    
    
    public function update(Sala $sala, Request $request){
        // Lógica para atualizar uma sala específica
        $data = $request->validate([
            'nome'=>'required',
            'numero'=>'nullable',
            'departamento_id'=>'required',
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
