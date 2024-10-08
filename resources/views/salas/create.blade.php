@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Criar Nova Sala</h2>
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
            <form action="{{ route('salas.store') }}" method="POST">
                @csrf
                <div class="form-group mt-3">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" class="form-control" placeholder="Nome da Sala">
                </div>
                <div class="form-group mt-3">
                    <label for="numero">Número:</label>
                    <input type="text" name="numero" class="form-control" placeholder="Número da Sala (opcional)">
                </div>
                <div class="form-group mt-3">
                    <label for="departamento_id">Departamento:</label>
                    <select name="departamento_id" class="form-control">
                        @foreach($departamentos as $departamento)
                            <option value="{{ $departamento->id }}">{{ $departamento->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success mt-3">Salvar</button>
            </form>
        </div>
    </div>
</div>
@endsection
