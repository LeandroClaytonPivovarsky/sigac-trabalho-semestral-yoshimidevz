@extends('layouts.app')

@section('title', 'Detalhes do Documento')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">Detalhes do Documento</h1>
    <div>
        <a href="{{ route('documentos.edit', $documento->id) }}" class="btn btn-warning">
            <i class="fas fa-edit"></i> Editar
        </a>
        <a href="{{ route('documentos.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Voltar
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Informações do Documento</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Título:</h6>
                <p>{{ $documento->titulo }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Data de Emissão:</h6>
                <p>{{ $documento->data_emissao->format('d/m/Y') }}</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Aluno:</h6>
                <p>
                    @if($documento->aluno)
                        <a href="{{ route('alunos.show', $documento->aluno->id) }}">
                            {{ $documento->aluno->nome }}
                        </a>
                    @else
                        N/A
                    @endif
                </p>
            </div>
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Categoria:</h6>
                <p>
                    @if($documento->categoria)
                        <a href="{{ route('categorias.show', $documento->categoria->id) }}">
                            {{ $documento->categoria->nome }}
                        </a>
                    @else
                        N/A
                    @endif
                </p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12 mb-3">
                <h6 class="fw-bold">Descrição:</h6>
                <p>{{ $documento->descricao ?? 'Nenhuma descrição fornecida.' }}</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12 mb-3">
                <h6 class="fw-bold">Arquivo:</h6>
                @if($documento->arquivo)
                    <div class="mt-2">
                        <a href="{{ asset($documento->arquivo) }}" class="btn btn-sm btn-primary" target="_blank">
                            <i class="fas fa-download"></i> Baixar Arquivo
                        </a>
                    </div>
                @else
                    <p>Nenhum arquivo disponível.</p>
                @endif
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Data de Cadastro:</h6>
                <p>{{ $documento->created_at->format('d/m/Y H:i:s') }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Última Atualização:</h6>
                <p>{{ $documento->updated_at->format('d/m/Y H:i:s') }}</p>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Comprovantes Relacionados</h5>
            </div>
            <div class="card-body">
                @if($documento->comprovantes->count() > 0)
                    <ul class="list-group">
                        @foreach($documento->comprovantes as $comprovante)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $comprovante->titulo }}
                                <a href="{{ route('comprovantes.show', $comprovante->id) }}" class="btn btn-sm btn-info text-white">
                                    <i class="fas fa-eye"></i> Ver
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted">Nenhum comprovante relacionado a este documento.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
