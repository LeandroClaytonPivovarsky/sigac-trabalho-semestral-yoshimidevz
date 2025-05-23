@extends('layouts.app')

@section('title', 'Detalhes do Comprovante')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">Detalhes do Comprovante</h1>
    <div>
        <a href="{{ route('comprovantes.edit', $comprovante->id) }}" class="btn btn-warning">
            <i class="fas fa-edit"></i> Editar
        </a>
        <a href="{{ route('comprovantes.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Voltar
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Informações do Comprovante</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Título:</h6>
                <p>{{ $comprovante->titulo }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Data de Emissão:</h6>
                <p>{{ $comprovante->data_emissao->format('d/m/Y') }}</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Aluno:</h6>
                <p>
                    @if($comprovante->aluno)
                        <a href="{{ route('alunos.show', $comprovante->aluno->id) }}">
                            {{ $comprovante->aluno->nome }}
                        </a>
                    @else
                        N/A
                    @endif
                </p>
            </div>
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Documento:</h6>
                <p>
                    @if($comprovante->documento)
                        <a href="{{ route('documentos.show', $comprovante->documento->id) }}">
                            {{ $comprovante->documento->titulo }}
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
                <p>{{ $comprovante->descricao ?? 'Nenhuma descrição fornecida.' }}</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12 mb-3">
                <h6 class="fw-bold">Arquivo:</h6>
                @if($comprovante->arquivo)
                    <div class="mt-2">
                        <a href="{{ asset($comprovante->arquivo) }}" class="btn btn-sm btn-primary" target="_blank">
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
                <p>{{ $comprovante->created_at->format('d/m/Y H:i:s') }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Última Atualização:</h6>
                <p>{{ $comprovante->updated_at->format('d/m/Y H:i:s') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
