@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="font-bold text-white">Lista de Salas</h2>
            <a class="btn btn-success" href="{{ route('salas.create') }}"> Criar Nova Sala</a>
            @if ($message = Session::get('success'))
                <div class="alert alert-success mt-3">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-bordered mt-3">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Número</th>
                    <th>Departamento</th>
                    <th>Ações</th>
                </tr>
                @foreach ($salas as $sala)
                <tr>
                    <td>{{ $sala->id }}</td>
                    <td>{{ $sala->nome }}</td>
                    <td>{{ $sala->numero }}</td>
                    <td>{{ $sala->departamento->nome }}</td>
                    <td class="actions align-middle justify-evenly">
                        <a class="btn btn-info" href="{{ route('salas.show', $sala->id) }}">Ver</a>
                        <a class="btn btn-primary" href="{{ route('salas.edit', $sala->id) }}">Editar</a>
                        <form action="{{ route('salas.destroy', $sala->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>

            {!! $salas->links() !!}
        </div>
    </div>
</div>
@endsection
