@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="font-bold text-white">Detalhes do Funcionário</h2>
            <a class="btn btn-primary" href="{{ route('funcionarios.index') }}"> Voltar</a>
            <div class="data">
                <strong class="font-bold text-white">Identificador:</strong> {{ $funcionario->intermaritima_id }}<br>
                <strong class="font-bold text-white">Nome:</strong> {{ $funcionario->nome }}<br>
                <strong class="font-bold text-white">Cargo:</strong> {{ $funcionario->cargo }}<br>
                <strong class="font-bold text-white">Departamento:</strong> {{ $funcionario->departamento->nome }}<br>
                <strong class="font-bold text-white"> É Admin?</strong> {{ $funcionario->is_admin ? 'Sim' : 'Não' }}<br>
            </div>
        </div>
    </div>
</div>
@endsection
