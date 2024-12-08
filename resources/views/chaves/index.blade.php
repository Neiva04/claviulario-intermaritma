@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="font-bold text-white">Lista de Chaves</h2>
            <a class="btn btn-success" href="{{ route('chaves.create') }}"> Criar Nova Chave</a>
            @if ($message = Session::get('success'))
                <div class="alert alert-success mt-3">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-bordered mt-3">
                <tr>
                    <th>ID</th>
                    <th>Identificador</th>
                    <th>Sala</th>
                    <th>Está Alocada</th>
                    <th>Funcionário</th>
                    <th>Ações</th>
                </tr>
                @foreach ($chaves as $chave)
                <tr>
                    <td>{{ $chave->id }}</td>
                    <td>{{ $chave->intermaritima_id }}</td>
                    <td>{{ $chave->sala ? $chave->sala->nome : 'Não atribuída' }}</td>
                    <td>{{ $chave->is_locado ? 'Sim' : 'Não' }}</td>
                    <td>{{ $chave->funcionario ? $chave->funcionario->nome : 'Nenhum' }}</td>
                    <td class="actions align-middle justify-evenly">
                    <a class="btn btn-info" href="{{ route('chaves.show', $chave->id) }}">Ver</a>
                    <a class="btn btn-primary" href="{{ route('chaves.edit', $chave->id) }}">Editar</a>
                    <form action="{{ route('chaves.destroy', $chave->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Deletar</button>
                    </form>
                    </td>
                </tr>
                @endforeach
            </table>

            {!! $chaves->links() !!}
        </div>
    </div>
</div>
@endsection
