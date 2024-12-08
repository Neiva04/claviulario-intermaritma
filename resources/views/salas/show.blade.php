@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="font-bold text-white">Detalhes da Sala</h2>
            <a class="btn btn-primary" href="{{ route('salas.index') }}"> Voltar</a>
            <div class="data">
                <strong class="font-bold text-white">Nome:</strong> {{ $sala->nome }}<br>
                <strong class="font-bold text-white">Número:</strong> {{ $sala->numero }}<br>
                <strong class="font-bold text-white">Departamento:</strong> {{ $sala->departamento->nome }}<br>
            </div>
        </div>
    </div>
</div>
@endsection
