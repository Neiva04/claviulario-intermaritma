@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Detalhes da Chave</h2>
            <a class="btn btn-primary" href="{{ route('chaves.index') }}"> Voltar</a>
            <div class="mt-3">
                <strong>Identificador:</strong> {{ $chave->intermaritima_id }}<br>
                <strong>Sala:</strong> 
                {{ $chave->sala ? $chave->sala->nome : 'Sala não atribuída' }}<br>
                <strong>Está Locada?</strong> 
                {{ $chave->is_locado ? 'Sim' : 'Não' }}<br>
                @if($chave->is_locado)
                    <strong>Funcionário Responsável:</strong> 
                    {{ $chave->funcionario ? $chave->funcionario->nome : 'Não especificado' }}<br>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
