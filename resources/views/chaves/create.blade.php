@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Criar Nova Chave</h2>
            <a class="btn btn-primary" href="{{ route('chaves.index') }}"> Voltar</a>
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
            <form action="{{ route('chaves.store') }}" method="POST">
                @csrf
                <div class="form-group mt-3">
                    <label for="intermaritima_id">Identificador Intermaritima:</label>
                    <input type="text" name="intermaritima_id" class="form-control" placeholder="Identificador">
                </div>

                <div class="form-group mt-3">
                    <label for="sala_id">Sala:</label>
                    <select name="sala_id" class="form-control">
                        @foreach($salas as $sala)
                            <option value="{{ $sala->id }}">{{ $sala->nome }}</option>
                        @endforeach
                    </select>
                </div>
              
                <div class="form-group mt-3">
                    <label for="is_locado">Está alocado?</label>
                    <select name="is_locado" class="form-control">
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label for="funcionario_id">Funcionario:</label>
                    <select name="funcionario_id" class="form-control">
                        @foreach($funcionarios as $funcionario)
                            <option value="{{ $funcionario->id }}">{{ $funcionario->nome }}</option>
                        @endforeach
                    </select>
                </div>
                
                <button type="submit" class="btn btn-success mt-3">Salvar</button>
            </form>
        </div>
    </div>
</div>
@endsection
