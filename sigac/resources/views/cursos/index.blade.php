@extends('layouts.app')

@section('title', 'Cursos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">Cursos</h1>
    <a href="{{ route('cursos.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Novo Curso
    </a>
</div>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h5 class="mb-0">Lista de Cursos</h5>
            </div>
            <div class="col-md-6">
                <form action="{{ route('cursos.index') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Buscar curso..." value="{{ request('search') }}">
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
                        <th>Categoria</th>
                        <th>Nível</th>
                        <th>Carga Horária</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cursos as $curso)
                    <tr>
                        <td>{{ $curso->id }}</td>
                        <td>{{ $curso->nome }}</td>
                        <td>{{ $curso->categoria->nome ?? 'N/A' }}</td>
                        <td>{{ $curso->nivel->nome ?? 'N/A' }}</td>
                        <td>{{ $curso->carga_horaria }} horas</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('cursos.show', $curso->id) }}" class="btn btn-sm btn-info text-white" title="Visualizar">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-sm btn-warning text-white" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este curso?')">
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
                        <td colspan="6" class="text-center">Nenhum curso encontrado.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                Exibindo {{ $cursos->count() }} de {{ $cursos->total() }} cursos
            </div>
            <div>
                {{ $cursos->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
