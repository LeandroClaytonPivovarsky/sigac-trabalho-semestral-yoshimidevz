@extends('layouts.app')

@section('title', 'Declarações')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">Declarações</h1>
    <a href="{{ route('declaracoes.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Nova Declaração
    </a>
</div>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h5 class="mb-0">Lista de Declarações</h5>
            </div>
            <div class="col-md-6">
                <form action="{{ route('declaracoes.index') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Buscar declaração..." value="{{ request('search') }}">
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
                        <th>Data de Emissão</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($declaracoes as $declaracao)
                    <tr>
                        <td>{{ $declaracao->id }}</td>
                        <td>{{ $declaracao->titulo }}</td>
                        <td>{{ $declaracao->aluno->nome ?? 'N/A' }}</td>
                        <td>{{ $declaracao->data_emissao->format('d/m/Y') }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('declaracoes.show', $declaracao->id) }}" class="btn btn-sm btn-info text-white" title="Visualizar">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('declaracoes.edit', $declaracao->id) }}" class="btn btn-sm btn-warning text-white" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('declaracoes.destroy', $declaracao->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir esta declaração?')">
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
                        <td colspan="5" class="text-center">Nenhuma declaração encontrada.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                Exibindo {{ $declaracoes->count() }} de {{ $declaracoes->total() }} declarações
            </div>
            <div>
                {{ $declaracoes->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
