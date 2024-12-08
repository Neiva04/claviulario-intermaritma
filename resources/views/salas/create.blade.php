@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="font-bold text-white">Criar Nova Sala</h2>
            <a class="btn btn-primary" href="{{ route('salas.index') }}"> Voltar</a>
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
            <form class="form" action="{{ route('salas.store') }}" method="POST">
                @csrf
                <div class="form-group mt-3">
                    <label class="font-bold text-white" for="nome">Nome:</label>
                    <input type="text" name="nome" class="form-control" placeholder="Nome da Sala">
                    @error('nome')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
               
                <div class="form-group mt-3">
                    <label class="font-bold text-white" for="numero">Número:</label>
                    <input type="text" name="numero" class="form-control" placeholder="Número da Sala (opcional)">
                </div>
                
                <div class="form-group mt-3">
                    <label class="font-bold text-white" for="departamento_id">Departamento:</label>
                    <select name="departamento_id" class="form-control">
                        @foreach($departamentos as $departamento)
                            <option value="{{ $departamento->id }}">{{ $departamento->nome }}</option>
                        @endforeach
                    </select>
                    @error('departamento_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="button">Salvar</button>
            </form>
        </div>
    </div>
</div>
@endsection
