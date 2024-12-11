@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="font-bold text-white">Editar Chave</h2>
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
            <form class="form" action="{{ route('chaves.update', $chave->id) }}" method="POST">
             @csrf
            @method('PUT')
                
                <div class="form-group mt-3">
                    <label class="font-bold text-white" for="intermaritima_id">Identificador Intermaritima:</label>
                    <input 
                        type="text" 
                        name="intermaritima_id" 
                        class="form-control" 
                        value="{{ old('intermaritima_id', $chave->intermaritima_id) }}"
                        required
                    >
                </div>
                
                <div class="form-group mt-3">
                    <label class="font-bold text-white" for="sala_id">Sala:</label>
                    <select name="sala_id" class="form-control" required>
                        <option value="" disabled {{ !$chave->sala_id ? 'selected' : '' }}>Selecione uma Sala</option>
                        @foreach($salas as $sala)
                            <option 
                                value="{{ $sala->id }}" 
                                {{ old('sala_id', $chave->sala_id) == $sala->id ? 'selected' : '' }}
                            >
                                {{ $sala->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group mt-3">
                    <label class="font-bold text-white" for="is_locado">Está alocado?</label>
                    <select name="is_locado" class="form-control" id="is_locado" required>
                        <option value="0" {{ old('is_locado', $chave->is_locado) == 0 ? 'selected' : '' }}>Não</option>
                        <option value="1" {{ old('is_locado', $chave->is_locado) == 1 ? 'selected' : '' }}>Sim</option>
                    </select>
                </div>
                
                <div class="form-group mt-3">
                    <label class="font-bold text-white" for="funcionario_id">Funcionário:</label>
                    <select 
                        name="funcionario_id" 
                        class="form-control" 
                        id="funcionario_id" 
                        {{ old('is_locado', $chave->is_locado) == 0 ? 'disabled' : '' }}
                    >
                        <option value="">Nenhum</option>
                        @foreach($funcionarios as $funcionario)
                            <option 
                                value="{{ $funcionario->id }}" 
                                {{ old('funcionario_id', $chave->funcionario_id) == $funcionario->id ? 'selected' : '' }}
                            >
                                {{ $funcionario->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const isLocadoSelect = document.getElementById('is_locado');
                        const funcionarioSelect = document.getElementById('funcionario_id');

                        // Atualizar o estado do dropdown de Funcionário ao carregar a página
                        toggleFuncionarioSelect(isLocadoSelect.value);

                        // Adicionar evento de mudança ao dropdown de "Está alocado?"
                        isLocadoSelect.addEventListener('change', function () {
                            toggleFuncionarioSelect(this.value);
                        });

                        function toggleFuncionarioSelect(isLocado) {
                            if (isLocado === '1') { // Habilita o campo quando está alocado
                                funcionarioSelect.disabled = false;
                            } else { // Desabilita o campo e reseta o valor quando não está alocado
                                funcionarioSelect.disabled = true;
                                funcionarioSelect.value = '';
                            }
                        }
                    });
                </script>

                <button type="submit" class="button">Salvar</button>
            </form>
        </div>
    </div>
</div>


@endsection
