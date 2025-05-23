@extends('layouts.app')

@section('title', 'Detalhes do Aluno')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">Detalhes do Aluno</h1>
    <div>
        <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn btn-warning">
            <i class="fas fa-edit"></i> Editar
        </a>
        <a href="{{ route('alunos.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Voltar
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Informações do Aluno</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Nome Completo:</h6>
                <p>{{ $aluno->nome }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">CPF:</h6>
                <p>{{ substr($aluno->cpf, 0, 3) . '.' . substr($aluno->cpf, 3, 3) . '.' . substr($aluno->cpf, 6, 3) . '-' . substr($aluno->cpf, 9, 2) }}</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Email:</h6>
                <p>{{ $aluno->email }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Usuário:</h6>
                <p>{{ $aluno->user->name ?? 'N/A' }}</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Curso:</h6>
                <p>{{ $aluno->curso->nome ?? 'N/A' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Turma:</h6>
                <p>{{ $aluno->turma->nome ?? 'N/A' }}</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Data de Cadastro:</h6>
                <p>{{ $aluno->created_at->format('d/m/Y H:i:s') }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Última Atualização:</h6>
                <p>{{ $aluno->updated_at->format('d/m/Y H:i:s') }}</p>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Documentos</h5>
            </div>
            <div class="card-body">
                @if($aluno->documentos->count() > 0)
                    <ul class="list-group">
                        @foreach($aluno->documentos as $documento)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $documento->titulo }}
                                <a href="{{ route('documentos.show', $documento->id) }}" class="btn btn-sm btn-info text-white">
                                    <i class="fas fa-eye"></i> Ver
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted">Nenhum documento encontrado.</p>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Comprovantes</h5>
            </div>
            <div class="card-body">
                @if($aluno->comprovantes->count() > 0)
                    <ul class="list-group">
                        @foreach($aluno->comprovantes as $comprovante)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $comprovante->titulo }}
                                <a href="{{ route('comprovantes.show', $comprovante->id) }}" class="btn btn-sm btn-info text-white">
                                    <i class="fas fa-eye"></i> Ver
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted">Nenhum comprovante encontrado.</p>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Declarações</h5>
            </div>
            <div class="card-body">
                @if($aluno->declaracoes->count() > 0)
                    <ul class="list-group">
                        @foreach($aluno->declaracoes as $declaracao)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $declaracao->titulo }}
                                <a href="{{ route('declaracoes.show', $declaracao->id) }}" class="btn btn-sm btn-info text-white">
                                    <i class="fas fa-eye"></i> Ver
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted">Nenhuma declaração encontrada.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
