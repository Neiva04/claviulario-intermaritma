@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Detalhes do Funcionário</h2>
            <a class="btn btn-primary" href="{{ route('funcionarios.index') }}"> Voltar</a>
            <div class="mt-3">
                <strong>Identificador:</strong> {{ $funcionario->intermaritima_id }}<br>
                <strong>Nome:</strong> {{ $funcionario->nome }}<br>
                <strong>Cargo:</strong> {{ $funcionario->cargo }}<br>
                <strong>Departamento:</strong> {{ $funcionario->departamento->nome }}<br>
                <strong>É Admin?</strong> {{ $funcionario->is_admin ? 'Sim' : 'Não' }}<br>
            </div>
        </div>
    </div>
</div>
@endsection
