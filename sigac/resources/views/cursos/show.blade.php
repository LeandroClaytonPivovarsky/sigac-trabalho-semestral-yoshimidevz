@extends('layouts.app')

@section('title', 'Detalhes do Curso')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">Detalhes do Curso</h1>
    <div>
        <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-warning">
            <i class="fas fa-edit"></i> Editar
        </a>
        <a href="{{ route('cursos.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Voltar
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Informações do Curso</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Nome:</h6>
                <p>{{ $curso->nome }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Carga Horária:</h6>
                <p>{{ $curso->carga_horaria }} horas</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Categoria:</h6>
                <p>
                    @if($curso->categoria)
                        <a href="{{ route('categorias.show', $curso->categoria->id) }}">
                            {{ $curso->categoria->nome }}
                        </a>
                    @else
                        N/A
                    @endif
                </p>
            </div>
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Nível:</h6>
                <p>
                    @if($curso->nivel)
                        <a href="{{ route('niveis.show', $curso->nivel->id) }}">
                            {{ $curso->nivel->nome }}
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
                <p>{{ $curso->descricao ?? 'Nenhuma descrição fornecida.' }}</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Data de Cadastro:</h6>
                <p>{{ $curso->created_at->format('d/m/Y H:i:s') }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Última Atualização:</h6>
                <p>{{ $curso->updated_at->format('d/m/Y H:i:s') }}</p>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Turmas</h5>
            </div>
            <div class="card-body">
                @if($curso->turmas->count() > 0)
                    <ul class="list-group">
                        @foreach($curso->turmas as $turma)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $turma->nome }}
                                <a href="{{ route('turmas.show', $turma->id) }}" class="btn btn-sm btn-info text-white">
                                    <i class="fas fa-eye"></i> Ver
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted">Nenhuma turma cadastrada para este curso.</p>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Alunos</h5>
            </div>
            <div class="card-body">
                @if($curso->alunos->count() > 0)
                    <ul class="list-group">
                        @foreach($curso->alunos as $aluno)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $aluno->nome }}
                                <a href="{{ route('alunos.show', $aluno->id) }}" class="btn btn-sm btn-info text-white">
                                    <i class="fas fa-eye"></i> Ver
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted">Nenhum aluno matriculado neste curso.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
