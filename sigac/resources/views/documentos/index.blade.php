@extends('layouts.app')

@section('title', 'Documentos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">Documentos</h1>
    <a href="{{ route('documentos.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Novo Documento
    </a>
</div>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h5 class="mb-0">Lista de Documentos</h5>
            </div>
            <div class="col-md-6">
                <form action="{{ route('documentos.index') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Buscar documento..." value="{{ request('search') }}">
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
                        <th>Título</th>
                        <th>Aluno</th>
                        <th>Categoria</th>
                        <th>Data de Emissão</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($documentos as $documento)
                    <tr>
                        <td>{{ $documento->id }}</td>
                        <td>{{ $documento->titulo }}</td>
                        <td>{{ $documento->aluno->nome ?? 'N/A' }}</td>
                        <td>{{ $documento->categoria->nome ?? 'N/A' }}</td>
                        <td>{{ $documento->data_emissao->format('d/m/Y') }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('documentos.show', $documento->id) }}" class="btn btn-sm btn-info text-white" title="Visualizar">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('documentos.edit', $documento->id) }}" class="btn btn-sm btn-warning text-white" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('documentos.destroy', $documento->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este documento?')">
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
                        <td colspan="6" class="text-center">Nenhum documento encontrado.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                Exibindo {{ $documentos->count() }} de {{ $documentos->total() }} documentos
            </div>
            <div>
                {{ $documentos->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
