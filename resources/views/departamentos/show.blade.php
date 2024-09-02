@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Detalhes do Departamento</h2>
            <a class="btn btn-primary" href="{{ route('departamentos.index') }}"> Voltar</a>
            <div class="mt-3">
                <strong>Nome:</strong> {{ $departamento->nome }}<br>
            </div>
        </div>
    </div>
</div>
@endsection
