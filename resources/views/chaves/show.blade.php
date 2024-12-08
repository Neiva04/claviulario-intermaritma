@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="font-bold text-white">Detalhes da Chave</h2>
            <a class="btn btn-primary" href="{{ route('chaves.index') }}"> Voltar</a>
            <div class="data">
                <strong class="font-bold text-white">Identificador:</strong> {{ $chave->intermaritima_id }}<br>
                <strong class="font-bold text-white">Sala:</strong> {{ $chave->sala ? $chave->sala->nome : 'Sala não atribuída' }}<br>
                <strong class="font-bold text-white">Está Locada?</strong> 
                {{ $chave->is_locado ? 'Sim' : 'Não' }}<br>
                @if($chave->is_locado)
                    <strong class="font-bold text-white">Funcionário Responsável:</strong> {{ $chave->funcionario ? $chave->funcionario->nome : 'Não especificado' }}<br>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
