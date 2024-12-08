@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="font-bold text-white">Lista de Departamentos</h2>
            <a class="btn btn-success" href="{{ route('departamentos.create') }}"> Criar Novo Departamento</a>
            @if ($message = Session::get('success'))
                <div class="alert alert-success mt-3">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-bordered mt-3">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
                @foreach ($departamentos as $departamento)
                <tr>
                    <td>{{ $departamento->id }}</td>
                    <td>{{ $departamento->nome }}</td>
                    <td class="actions align-middle justify-evenly">
                        <a class="btn btn-info" href="{{ route('departamentos.show', $departamento->id) }}">Ver</a>
                        <a class="btn btn-primary" href="{{ route('departamentos.edit', $departamento->id) }}">Editar</a>
                        <form action="{{ route('departamentos.destroy', $departamento->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>

            {!! $departamentos->links() !!}
        </div>
    </div>
</div>
@endsection
