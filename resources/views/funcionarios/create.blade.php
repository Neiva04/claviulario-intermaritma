@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="font-bold text-white">Criar Novo Funcionário</h2>
            <a class="btn btn-primary " href="{{ route('funcionarios.index') }}"> Voltar</a>
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
            <form class="form" action="{{ route('funcionarios.store') }}" method="POST">
                @csrf
                <div class="form-group mt-3">
                    <label class="font-bold text-white" for="intermaritima_id">Identificador Intermaritima:</label>
                    <input type="text" name="intermaritima_id" class="form-control" placeholder="Identificador" value="{{ old('intermaritima_id') }}">
                    @error('intermaritima_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group mt-3">
                    <label class="font-bold text-white" for="nome">Nome:</label>
                    <input type="text" name="nome" class="form-control" placeholder="Nome" value="{{ old('nome') }}">
                    @error('nome')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group mt-3">
                    <label class="font-bold text-white" for="cargo">Cargo:</label>
                    <input type="text" name="cargo" class="form-control" placeholder="Cargo" value="{{ old('cargo') }}">
                    @error('cargo')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group mt-3">
                    <label class="font-bold text-white" for="departamento_id">Departamento:</label>
                    <select name="departamento_id" class="form-control">
                        @foreach($departamentos as $departamento)
                            <option value="{{ $departamento->id }}" {{ old('departamento_id') == $departamento->id ? 'selected' : '' }}>
                                {{ $departamento->nome }}
                            </option>
                        @endforeach
                    </select>
                    @error('departamento_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group mt-3">
                    <label class="font-bold text-white" for="is_admin">É Admin?</label>
                    <select name="is_admin" class="form-control">
                        <option value="0" {{ old('is_admin') == '0' ? 'selected' : '' }}>Não</option>
                        <option value="1" {{ old('is_admin') == '1' ? 'selected' : '' }}>Sim</option>
                    </select>
                    @error('is_admin')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                <button type="submit" class="button">Salvar</button>
            </form>

        </div>
    </div>
</div>
@endsection
