@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">Dashboard</h1>
</div>

<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card bg-primary text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase mb-0">Alunos</h6>
                        <h2 class="mt-2 mb-0">{{ $totalAlunos ?? 0 }}</h2>
                    </div>
                    <i class="fas fa-user-graduate fa-3x opacity-50"></i>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a href="{{ route('alunos.index') }}" class="text-white text-decoration-none">Ver detalhes</a>
                <i class="fas fa-arrow-circle-right text-white"></i>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="card bg-success text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase mb-0">Cursos</h6>
                        <h2 class="mt-2 mb-0">{{ $totalCursos ?? 0 }}</h2>
                    </div>
                    <i class="fas fa-book fa-3x opacity-50"></i>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a href="{{ route('cursos.index') }}" class="text-white text-decoration-none">Ver detalhes</a>
                <i class="fas fa-arrow-circle-right text-white"></i>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="card bg-warning text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase mb-0">Turmas</h6>
                        <h2 class="mt-2 mb-0">{{ $totalTurmas ?? 0 }}</h2>
                    </div>
                    <i class="fas fa-users fa-3x opacity-50"></i>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a href="{{ route('turmas.index') }}" class="text-white text-decoration-none">Ver detalhes</a>
                <i class="fas fa-arrow-circle-right text-white"></i>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="card bg-danger text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase mb-0">Documentos</h6>
                        <h2 class="mt-2 mb-0">{{ $totalDocumentos ?? 0 }}</h2>
                    </div>
                    <i class="fas fa-file-pdf fa-3x opacity-50"></i>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a href="{{ route('documentos.index') }}" class="text-white text-decoration-none">Ver detalhes</a>
                <i class="fas fa-arrow-circle-right text-white"></i>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Últimos Alunos Cadastrados</h5>
            </div>
            <div class="card-body">
                @if(isset($ultimosAlunos) && $ultimosAlunos->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Curso</th>
                                    <th>Data</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ultimosAlunos as $aluno)
                                <tr>
                                    <td>{{ $aluno->nome }}</td>
                                    <td>{{ $aluno->curso->nome ?? 'N/A' }}</td>
                                    <td>{{ $aluno->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route('alunos.show', $aluno->id) }}" class="btn btn-sm btn-info text-white">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted">Nenhum aluno cadastrado recentemente.</p>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Últimos Documentos Emitidos</h5>
            </div>
            <div class="card-body">
                @if(isset($ultimosDocumentos) && $ultimosDocumentos->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Aluno</th>
                                    <th>Data</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ultimosDocumentos as $documento)
                                <tr>
                                    <td>{{ $documento->titulo }}</td>
                                    <td>{{ $documento->aluno->nome ?? 'N/A' }}</td>
                                    <td>{{ $documento->data_emissao->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route('documentos.show', $documento->id) }}" class="btn btn-sm btn-info text-white">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted">Nenhum documento emitido recentemente.</p>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Acesso Rápido</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('alunos.create') }}" class="btn btn-outline-primary w-100 py-3">
                            <i class="fas fa-user-plus fa-2x mb-2"></i>
                            <div>Novo Aluno</div>
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('documentos.create') }}" class="btn btn-outline-danger w-100 py-3">
                            <i class="fas fa-file-medical fa-2x mb-2"></i>
                            <div>Novo Documento</div>
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('turmas.create') }}" class="btn btn-outline-warning w-100 py-3">
                            <i class="fas fa-users-cog fa-2x mb-2"></i>
                            <div>Nova Turma</div>
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('cursos.create') }}" class="btn btn-outline-success w-100 py-3">
                            <i class="fas fa-book-medical fa-2x mb-2"></i>
                            <div>Novo Curso</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
