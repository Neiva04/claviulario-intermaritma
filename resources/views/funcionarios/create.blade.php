@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Criar Novo Funcionário</h2>
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
            <form action="{{ route('funcionarios.store') }}" method="POST">
                @csrf
                <div class="form-group mt-3">
                    <label for="intermaritima_id">Identificador Intermaritima:</label>
                    <input type="text" name="intermaritima_id" class="form-control" placeholder="Identificador">
                </div>
                <div class="form-group mt-3">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" class="form-control" placeholder="Nome">
                </div>
                <div class="form-group mt-3">
                    <label for="cargo">Cargo:</label>
                    <input type="text" name="cargo" class="form-control" placeholder="Cargo">
                </div>
                <div class="form-group mt-3">
                    <label for="departamento_id">Departamento:</label>
                    <select name="departamento_id" class="form-control">
                        @foreach($departamentos as $departamento)
                            <option value="{{ $departamento->id }}">{{ $departamento->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="is_admin">É Admin?</label>
                    <select name="is_admin" class="form-control">
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success mt-3">Salvar</button>
            </form>
        </div>
    </div>
</div>
@endsection
