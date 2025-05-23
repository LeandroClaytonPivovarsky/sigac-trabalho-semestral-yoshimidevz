@extends('layouts.app')

@section('title', 'Detalhes da Turma')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">Detalhes da Turma</h1>
    <div>
        <a href="{{ route('turmas.edit', $turma->id) }}" class="btn btn-warning">
            <i class="fas fa-edit"></i> Editar
        </a>
        <a href="{{ route('turmas.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Voltar
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Informações da Turma</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Nome:</h6>
                <p>{{ $turma->nome }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Período:</h6>
                <p>{{ $turma->periodo }}</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Curso:</h6>
                <p>
                    @if($turma->curso)
                        <a href="{{ route('cursos.show', $turma->curso->id) }}">
                            {{ $turma->curso->nome }}
                        </a>
                    @else
                        N/A
                    @endif
                </p>
            </div>
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Vagas:</h6>
                <p>{{ $turma->vagas }}</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12 mb-3">
                <h6 class="fw-bold">Descrição:</h6>
                <p>{{ $turma->descricao ?? 'Nenhuma descrição fornecida.' }}</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Data de Cadastro:</h6>
                <p>{{ $turma->created_at->format('d/m/Y H:i:s') }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <h6 class="fw-bold">Última Atualização:</h6>
                <p>{{ $turma->updated_at->format('d/m/Y H:i:s') }}</p>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Alunos Matriculados</h5>
            </div>
            <div class="card-body">
                @if($turma->alunos->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($turma->alunos as $aluno)
                                <tr>
                                    <td>{{ $aluno->id }}</td>
                                    <td>{{ $aluno->nome }}</td>
                                    <td>{{ $aluno->email }}</td>
                                    <td>
                                        <a href="{{ route('alunos.show', $aluno->id) }}" class="btn btn-sm btn-info text-white">
                                            <i class="fas fa-eye"></i> Ver
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted">Nenhum aluno matriculado nesta turma.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
