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

    public function store(Request $request) {
        //dd($request->all());
        
        $data = $request->validate([
            'intermaritima_id' => 'required',
            'sala_id' => 'required|exists:salas,id',
            'is_locado' => 'required|boolean',
            'funcionario_id' => 'nullable|required_if:is_locado,1|exists:funcionarios,id',
        ]);
    
        if (!$request->is_locado) {
            $data['funcionario_id'] = null;
        }
    
        try {
            Chave::create($data);
            return redirect()->route('chaves.index')->with('success', 'Chave criado com sucesso!');
        } catch (\Illuminate\Database\QueryException $exception) {
                if ($exception->getCode() === '23000') { // Código para erro de chave duplicada
                    return back()
                        ->withErrors(['intermaritima_id' => 'O identificador informado já está em uso.'])
                        ->withInput();
                }
                throw $exception; // Repassa outras exceções não tratadas
            }
    }

    public function show($id){
        $chave = Chave::with(['sala', 'funcionario'])->findOrFail($id);

        return view('chaves.show', compact('chave'));
    }

    
    public function edit(Chave $chave) {
        $funcionarios = Funcionario::all();
        $salas = Sala::all();
        return view('chaves.edit', compact('chave', 'funcionarios', 'salas'));
    }

    public function update(Request $request, Chave $chave) {
        $data = $request->validate([
            'intermaritima_id' => 'required',
            'sala_id' => 'required|exists:salas,id',
            'is_locado' => 'required|boolean',
            'funcionario_id' => 'nullable|required_if:is_locado,1|exists:funcionarios,id',
        ]);
    
        if (!$request->is_locado) {
            $data['funcionario_id'] = null;
        }
    
        try {
            // Tenta atualizar o funcionário
            $chave->update($data);
            return redirect()->route('chaves.index')->with('success', 'Chave atualizado com sucesso!');
        } catch (\Illuminate\Database\QueryException $exception) {
            // Verifica se o erro é uma violação de chave única
            if ($exception->getCode() === '23000') {
                return back()->withErrors(['intermaritima_id' => 'Já existe uma chave com este identificador.'])->withInput();
            }
    
            // Lança a exceção para outros erros não tratados
            throw $exception;
        }
    }

    public function destroy(Chave $chave) {
        try {
            $chave->delete();
            return redirect()->route('chaves.index')->with('success', 'Chave deletada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('chaves.index')->with('error', 'Erro ao deletar chave: ' . $e->getMessage());
        }
    }
}
