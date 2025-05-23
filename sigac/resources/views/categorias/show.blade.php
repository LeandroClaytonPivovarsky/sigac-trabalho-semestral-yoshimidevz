@extends('layouts.app')

@section('title', 'Detalhes da Categoria')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">Detalhes da Categoria</h1>
    <div>
        <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning">
            <i class="fas fa-edit"></i> Editar
        </a>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Voltar
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Informações da Categoria</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Nome:</h6>
                <p>{{ $categoria->nome }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">ID:</h6>
                <p>{{ $categoria->id }}</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12 mb-3">
                <h6 class="fw-bold">Descrição:</h6>
                <p>{{ $categoria->descricao ?? 'Nenhuma descrição fornecida.' }}</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Data de Cadastro:</h6>
                <p>{{ $categoria->created_at->format('d/m/Y H:i:s') }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Última Atualização:</h6>
                <p>{{ $categoria->updated_at->format('d/m/Y H:i:s') }}</p>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Cursos Relacionados</h5>
            </div>
            <div class="card-body">
                @if($categoria->cursos->count() > 0)
                    <ul class="list-group">
                        @foreach($categoria->cursos as $curso)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $curso->nome }}
                                <a href="{{ route('cursos.show', $curso->id) }}" class="btn btn-sm btn-info text-white">
                                    <i class="fas fa-eye"></i> Ver
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted">Nenhum curso relacionado a esta categoria.</p>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Documentos Relacionados</h5>
            </div>
            <div class="card-body">
                @if($categoria->documentos->count() > 0)
                    <ul class="list-group">
                        @foreach($categoria->documentos as $documento)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $documento->titulo }}
                                <a href="{{ route('documentos.show', $documento->id) }}" class="btn btn-sm btn-info text-white">
                                    <i class="fas fa-eye"></i> Ver
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted">Nenhum documento relacionado a esta categoria.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
