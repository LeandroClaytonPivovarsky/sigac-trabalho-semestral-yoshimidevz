@extends('layouts.app')

@section('title', 'Níveis')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">Níveis</h1>
    <a href="{{ route('niveis.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Novo Nível
    </a>
</div>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h5 class="mb-0">Lista de Níveis</h5>
            </div>
            <div class="col-md-6">
                <form action="{{ route('niveis.index') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Buscar nível..." value="{{ request('search') }}">
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
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($niveis as $nivel)
                    <tr>
                        <td>{{ $nivel->id }}</td>
                        <td>{{ $nivel->nome }}</td>
                        <td>{{ Str::limit($nivel->descricao, 50) }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('niveis.show', $nivel->id) }}" class="btn btn-sm btn-info text-white" title="Visualizar">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('niveis.edit', $nivel->id) }}" class="btn btn-sm btn-warning text-white" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('niveis.destroy', $nivel->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este nível?')">
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
                        <td colspan="4" class="text-center">Nenhum nível encontrado.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                Exibindo {{ $niveis->count() }} de {{ $niveis->total() }} níveis
            </div>
            <div>
                {{ $niveis->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
