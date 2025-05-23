@extends('layouts.app')

@section('title', 'Comprovantes')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">Comprovantes</h1>
    <a href="{{ route('comprovantes.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Novo Comprovante
    </a>
</div>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h5 class="mb-0">Lista de Comprovantes</h5>
            </div>
            <div class="col-md-6">
                <form action="{{ route('comprovantes.index') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Buscar comprovante..." value="{{ request('search') }}">
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
                        <th>Documento</th>
                        <th>Data de Emissão</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($comprovantes as $comprovante)
                    <tr>
                        <td>{{ $comprovante->id }}</td>
                        <td>{{ $comprovante->titulo }}</td>
                        <td>{{ $comprovante->aluno->nome ?? 'N/A' }}</td>
                        <td>{{ $comprovante->documento->titulo ?? 'N/A' }}</td>
                        <td>{{ $comprovante->data_emissao->format('d/m/Y') }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('comprovantes.show', $comprovante->id) }}" class="btn btn-sm btn-info text-white" title="Visualizar">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('comprovantes.edit', $comprovante->id) }}" class="btn btn-sm btn-warning text-white" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('comprovantes.destroy', $comprovante->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este comprovante?')">
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
                        <td colspan="6" class="text-center">Nenhum comprovante encontrado.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                Exibindo {{ $comprovantes->count() }} de {{ $comprovantes->total() }} comprovantes
            </div>
            <div>
                {{ $comprovantes->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
