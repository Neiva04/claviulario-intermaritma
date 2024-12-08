@extends('layouts.app')

@section('content')
<div class="container centralize-card">
    <div class="card">
        <div class="card-header">
            <h2>O que você deseja fazer?</h2>
        </div>
        <div class="card-body">
            <div class="grid-container">
                <a class="button" href="{{ route('funcionarios.index') }}">Funcionários</a>
                <a class="button" href="{{ route('departamentos.index') }}">Departamentos</a>
                <a class="button" href="{{ route('chaves.index') }}">Chaves</a>
                <a class="button" href="{{ route('salas.index') }}">Salas</a>
            </div>    
        </div>
    </div>
</div>
@endsection