@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="font-bold text-white">Editar Departamento</h2>
            <a class="btn btn-primary" href="{{ route('departamentos.index') }}"> Voltar</a>
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
            <form class="form" action="{{ route('departamentos.update', $departamento->id) }}" method="POST">
                @csrf
                @method('PUT')  
                <div class="form-group mt-3">
                    <label class="font-bold text-white" for="nome">Nome:</label>
                    <input type="text" name="nome" class="form-control" value="{{ $departamento->nome }}">
                </div>
              
                <button type="submit" class="button">Salvar</button>
            </form>
        </div>
    </div>
</div>
@endsection
