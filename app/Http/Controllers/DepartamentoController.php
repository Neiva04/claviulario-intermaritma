<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::paginate(10); // Plural ajustado
        return view('departamentos.index', compact('departamentos'));
    }

    public function create()
    {
        return view('departamentos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|max:255',
        ]);

        try {
            Departamento::create($data);
            return redirect()->route('departamentos.index')->with('success', 'Departamento criado com sucesso!');
        } catch (\Illuminate\Database\QueryException $exception) {
                if ($exception->getCode() === '23000') { // Código para erro de chave duplicada
                    return back()
                        ->withErrors(['nome' => 'O nome informado já está em uso.'])
                        ->withInput();
                }
                throw $exception; // Repassa outras exceções não tratadas
            }
    }

    public function show(Departamento $departamento)
{
    return view('departamentos.show', compact('departamento'));
}

    public function edit(Departamento $departamento)
    {
        return view('departamentos.edit', compact('departamento')); // Ajuste na variável
    }

    public function update(Request $request, Departamento $departamento)
    {
        $data = $request->validate([
            'nome' => 'required|max:255',
        ]);

        try {
            // Tenta atualizar o funcionário
            $departamento->update($data);
            return redirect()->route('departamentos.index')->with('success', 'Departamento atualizado com sucesso!');
        } catch (\Illuminate\Database\QueryException $exception) {
            // Verifica se o erro é uma violação de chave única
            if ($exception->getCode() === '23000') {
                return back()->withErrors(['nome' => 'Já existe um departamento com este nome.'])->withInput();
            }
    
            // Lança a exceção para outros erros não tratados
            throw $exception;
        }
    }

    public function destroy(Departamento $departamento)
    {
        $departamento->delete();
        return redirect()->route('departamentos.index')->with('success', 'Departamento deletado com sucesso!');
    }
}
