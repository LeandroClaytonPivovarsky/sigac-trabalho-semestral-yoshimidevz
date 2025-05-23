@extends('layouts.app')

@section('title', 'Detalhes da Declaração')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">Detalhes da Declaração</h1>
    <div>
        <a href="{{ route('declaracoes.edit', $declaracao->id) }}" class="btn btn-warning">
            <i class="fas fa-edit"></i> Editar
        </a>
        <a href="{{ route('declaracoes.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Voltar
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Informações da Declaração</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Título:</h6>
                <p>{{ $declaracao->titulo }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Data de Emissão:</h6>
                <p>{{ $declaracao->data_emissao->format('d/m/Y') }}</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Aluno:</h6>
                <p>
                    @if($declaracao->aluno)
                        <a href="{{ route('alunos.show', $declaracao->aluno->id) }}">
                            {{ $declaracao->aluno->nome }}
                        </a>
                    @else
                        N/A
                    @endif
                </p>
            </div>
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">ID:</h6>
                <p>{{ $declaracao->id }}</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12 mb-3">
                <h6 class="fw-bold">Descrição:</h6>
                <p>{{ $declaracao->descricao ?? 'Nenhuma descrição fornecida.' }}</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12 mb-3">
                <h6 class="fw-bold">Conteúdo:</h6>
                <div class="p-3 bg-light border rounded">
                    {!! nl2br(e($declaracao->conteudo)) !!}
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Data de Cadastro:</h6>
                <p>{{ $declaracao->created_at->format('d/m/Y H:i:s') }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Última Atualização:</h6>
                <p>{{ $declaracao->updated_at->format('d/m/Y H:i:s') }}</p>
            </div>
        </div>
    </div>
</div>

<div class="mt-4">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Ações</h5>
        </div>
        <div class="card-body">
            <div class="d-flex gap-2">
                <a href="#" class="btn btn-primary" onclick="window.print()">
                    <i class="fas fa-print"></i> Imprimir Declaração
                </a>
                <a href="{{ route('declaracoes.edit', $declaracao->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar
                </a>
                <form action="{{ route('declaracoes.destroy', $declaracao->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir esta declaração?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash"></i> Excluir
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
