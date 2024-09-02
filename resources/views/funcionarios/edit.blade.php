@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Editar Funcionário</h2>
            <a class="btn btn-primary" href="{{ route('funcionarios.index') }}"> Voltar</a>
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
            <form action="{{ route('funcionarios.update', $funcionario->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mt-3">
                    <label for="intermaritima_id">Identificador Intermaritima:</label>
                    <input type="text" name="intermaritima_id" class="form-control" value="{{ $funcionario->intermaritima_id }}">
                </div>
                <div class="form-group mt-3">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" class="form-control" value="{{ $funcionario->nome }}">
                </div>
                <div class="form-group mt-3">
                    <label for="cargo">Cargo:</label>
                    <input type="text" name="cargo" class="form-control" value="{{ $funcionario->cargo }}">
                </div>
                <div class="form-group mt-3">
                    <label for="departamento_id">Departamento:</label>
                    <select name="departamento_id" class="form-control">
                        @foreach($departamentos as $departamento)
                            <option value="{{ $departamento->id }}" {{ $funcionario->departamento_id == $departamento->id ? 'selected' : '' }}>{{ $departamento->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="is_admin">É Admin?</label>
                    <select name="is_admin" class="form-control">
                        <option value="0" {{ $funcionario->is_admin == 0 ? 'selected' : '' }}>Não</option>
                        <option value="1" {{ $funcionario->is_admin == 1 ? 'selected' : '' }}>Sim</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success mt-3">Salvar</button>
            </form>
        </div>
    </div>
</div>
@endsection
