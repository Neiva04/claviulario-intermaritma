@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Editar Chave</h2>
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
            <form action="{{ route('chaves.update', $chave->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mt-3">
                    <label for="intermaritima_id">Identificador Intermaritima:</label>
                    <input type="text" name="intermaritima_id" class="form-control" value="{{ $chave->intermaritima_id }}">
                </div>
                <div class="form-group mt-3">
                    <label for="sala_id">Sala:</label>
                    <select name="sala_id" class="form-control">
                        @foreach($salas as $sala)
                            <option value="{{ $sala->id }}" {{ $chave->sala_id == $sala->id ? 'selected' : '' }}>{{ $sala->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success mt-3">Salvar</button>
            </form>
        </div>
    </div>
</div>
@endsection
