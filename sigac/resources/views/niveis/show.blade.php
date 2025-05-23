@extends('layouts.app')

@section('title', 'Detalhes do Nível')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">Detalhes do Nível</h1>
    <div>
        <a href="{{ route('niveis.edit', $nivel->id) }}" class="btn btn-warning">
            <i class="fas fa-edit"></i> Editar
        </a>
        <a href="{{ route('niveis.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Voltar
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Informações do Nível</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Nome:</h6>
                <p>{{ $nivel->nome }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">ID:</h6>
                <p>{{ $nivel->id }}</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12 mb-3">
                <h6 class="fw-bold">Descrição:</h6>
                <p>{{ $nivel->descricao ?? 'Nenhuma descrição fornecida.' }}</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Data de Cadastro:</h6>
                <p>{{ $nivel->created_at->format('d/m/Y H:i:s') }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Última Atualização:</h6>
                <p>{{ $nivel->updated_at->format('d/m/Y H:i:s') }}</p>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Cursos Relacionados</h5>
            </div>
            <div class="card-body">
                @if($nivel->cursos->count() > 0)
                    <ul class="list-group">
                        @foreach($nivel->cursos as $curso)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $curso->nome }}
                                <a href="{{ route('cursos.show', $curso->id) }}" class="btn btn-sm btn-info text-white">
                                    <i class="fas fa-eye"></i> Ver
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted">Nenhum curso relacionado a este nível.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
