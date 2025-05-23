@extends('layouts.app')

@section('title', 'Turmas')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">Turmas</h1>
    <a href="{{ route('turmas.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Nova Turma
    </a>
</div>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h5 class="mb-0">Lista de Turmas</h5>
            </div>
            <div class="col-md-6">
                <form action="{{ route('turmas.index') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Buscar turma..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-outline-primary">Buscar</button>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Curso</th>
                        <th>Período</th>
                        <th>Vagas</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($turmas as $turma)
                    <tr>
                        <td>{{ $turma->id }}</td>
                        <td>{{ $turma->nome }}</td>
                        <td>{{ $turma->curso->nome ?? 'N/A' }}</td>
                        <td>{{ $turma->periodo }}</td>
                        <td>{{ $turma->vagas }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('turmas.show', $turma->id) }}" class="btn btn-sm btn-info text-white" title="Visualizar">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('turmas.edit', $turma->id) }}" class="btn btn-sm btn-warning text-white" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('turmas.destroy', $turma->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir esta turma?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Excluir">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Nenhuma turma encontrada.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                Exibindo {{ $turmas->count() }} de {{ $turmas->total() }} turmas
            </div>
            <div>
                {{ $turmas->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
