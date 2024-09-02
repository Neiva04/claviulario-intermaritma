@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Detalhes da Sala</h2>
            <a class="btn btn-primary" href="{{ route('salas.index') }}"> Voltar</a>
            <div class="mt-3">
                <strong>Nome:</strong> {{ $sala->nome }}<br>
                <strong>Número:</strong> {{ $sala->numero }}<br>
                <strong>Departamento:</strong> {{ $sala->departamento->nome }}<br>
            </div>
        </div>
    </div>
</div>
@endsection
