@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Editar Sala</h2>
            <a class="btn btn-primary" href="{{ route('salas.index') }}"> Voltar</a>
            @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    <strong>Opa!</strong> Há algo de errado nos dados que você inseriu.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('salas.update', $sala->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mt-3">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" class="form-control" value="{{ $sala->nome }}">
                </div>
                <div class="form-group mt-3">
                    <label for="numero">Número:</label>
                    <input type="text" name="numero" class="form-control" value="{{ $sala->numero }}">
                </div>
                <div class="form-group mt-3">
                    <label for="departamento_id">Departamento:</label>
                    <select name="departamento_id" class="form-control">
                        @foreach($departamentos as $departamento)
                            <option value="{{ $departamento->id }}" {{ $sala->departamento_id == $departamento->id ? 'selected' : '' }}>{{ $departamento->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success mt-3">Salvar</button>
            </form>
        </div>
    </div>
</div>
@endsection
