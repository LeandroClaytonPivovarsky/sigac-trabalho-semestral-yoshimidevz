@extends('layouts.app')

@section('title', 'Editar Curso')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">Editar Curso</h1>
    <a href="{{ route('cursos.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Voltar
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Formulário de Edição</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('cursos.update', $curso->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome', $curso->nome) }}" required>
                    @error('nome')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6">
                    <label for="carga_horaria" class="form-label">Carga Horária (horas)</label>
                    <input type="number" class="form-control @error('carga_horaria') is-invalid @enderror" id="carga_horaria" name="carga_horaria" value="{{ old('carga_horaria', $curso->carga_horaria) }}" required min="1">
                    @error('carga_horaria')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea class="form-control @error('descricao') is-invalid @enderror" id="descricao" name="descricao" rows="4">{{ old('descricao', $curso->descricao) }}</textarea>
                    @error('descricao')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="categoria_id" class="form-label">Categoria</label>
                    <select class="form-select @error('categoria_id') is-invalid @enderror" id="categoria_id" name="categoria_id" required>
                        <option value="">Selecione uma categoria</option>
                        @foreach($categorias ?? [] as $categoria)
                            <option value="{{ $categoria->id }}" {{ old('categoria_id', $curso->categoria_id) == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nome }}
                            </option>
                        @endforeach
                    </select>
                    @error('categoria_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6">
                    <label for="nivel_id" class="form-label">Nível</label>
                    <select class="form-select @error('nivel_id') is-invalid @enderror" id="nivel_id" name="nivel_id" required>
                        <option value="">Selecione um nível</option>
                        @foreach($niveis ?? [] as $nivel)
                            <option value="{{ $nivel->id }}" {{ old('nivel_id', $curso->nivel_id) == $nivel->id ? 'selected' : '' }}>
                                {{ $nivel->nome }}
                            </option>
                        @endforeach
                    </select>
                    @error('nivel_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Atualizar
                </button>
                <a href="{{ route('cursos.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
