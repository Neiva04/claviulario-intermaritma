@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="font-bold text-white">Criar Nova Chave</h2>
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
            <form class="form" action="{{ route('chaves.store') }}" method="POST">
                @csrf
                <div class="form-group mt-3">
                    <label class="font-bold text-white" for="intermaritima_id">Identificador Intermaritima:</label>
                    <input type="text" name="intermaritima_id" class="form-control" placeholder="Identificador">
                    @error('intermaritima_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label class="font-bold text-white" for="sala_id">Sala:</label>
                    <select name="sala_id" class="form-control">
                        @foreach($salas as $sala)
                            <option value="{{ $sala->id }}">{{ $sala->nome }}</option>
                        @endforeach
                    </select>
                    @error('sala_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
              
                <div class="form-group mt-3">
                    <label class="font-bold text-white" for="is_locado">Está alocado?</label>
                    <select name="is_locado" class="form-control">
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                    @error('is_locado')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label class="font-bold text-white" for="funcionario_id">Funcionário:</label>
                    <select name="funcionario_id" class="form-control" id="funcionario_id" {{ old('is_locado') == '0' ? 'disabled' : '' }}>
                        <option value="">Nenhum funcionário</option>
                        @foreach($funcionarios as $funcionario)
                            <option value="{{ $funcionario->id }}" {{ old('funcionario_id') == $funcionario->id ? 'selected' : '' }}>
                                {{ $funcionario->nome }}
                            </option>
                        @endforeach
                    </select>
                    @error('funcionario_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <script>
                    document.querySelector('[name="is_locado"]').addEventListener('change', function () {
                        const funcionarioSelect = document.getElementById('funcionario_id');
                        funcionarioSelect.disabled = this.value === '0';
                        if (this.value === '0') {
                            funcionarioSelect.value = '';
                        }
                    });
                </script>
                
                <button type="submit" class="button">Salvar</button>
            </form>
        </div>
    </div>
</div>
@endsection
