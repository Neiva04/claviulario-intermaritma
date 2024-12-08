@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="font-bold text-white">Detalhes do Departamento</h2>
            <a class="btn btn-primary" href="{{ route('departamentos.index') }}"> Voltar</a>
            <div class="data">
                <strong class="font-bold text-white">Nome:</strong> {{ $departamento->nome }}<br>
            </div>
        </div>
    </div>
</div>
@endsection
