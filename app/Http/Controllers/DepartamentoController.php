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

        Departamento::create($data);
        return redirect()->route('departamentos.index')->with('success', 'Departamento criado com sucesso!');
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

        $departamento->update($data);
        return redirect()->route('departamentos.index')->with('success', 'Departamento atualizado com sucesso!');
    }

    public function destroy(Departamento $departamento)
    {
        $departamento->delete();
        return redirect()->route('departamentos.index')->with('success', 'Departamento deletado com sucesso!');
    }
}
