@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Lista de Funcionários</h2>
            <a class="btn btn-success" href="{{ route('funcionarios.create') }}"> Criar Novo Funcionário</a>
            @if ($message = Session::get('success'))
                <div class="alert alert-success mt-3">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-bordered mt-3">
                <tr>
                    <th>ID</th>
                    <th>Identificador</th>
                    <th>Nome</th>
                    <th>Cargo</th>
                    <th>Departamento</th>
                    <th>Ações</th>
                </tr>
                @foreach ($funcionarios as $funcionario)
                <tr>
                    <td>{{ $funcionario->id }}</td>
                    <td>{{ $funcionario->intermaritima_id }}</td>
                    <td>{{ $funcionario->nome }}</td>
                    <td>{{ $funcionario->cargo }}</td>
                    <td>{{ $funcionario->departamento?->nome ?? 'Não atribuído' }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('funcionarios.show', $funcionario->id) }}">Ver</a>
                        <a class="btn btn-primary" href="{{ route('funcionarios.edit', $funcionario->id) }}">Editar</a>
                        <form action="{{ route('funcionarios.destroy', $funcionario->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>

            {!! $funcionarios->links() !!}
        </div>
    </div>
</div>
@endsection
