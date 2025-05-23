@extends('layouts.app')

@section('title', 'Criar Turma')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">Criar Nova Turma</h1>
    <a href="{{ route('turmas.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Voltar
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Formulário de Cadastro</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('turmas.store') }}" method="POST">
            @csrf
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome') }}" required>
                    @error('nome')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6">
                    <label for="periodo" class="form-label">Período</label>
                    <select class="form-select @error('periodo') is-invalid @enderror" id="periodo" name="periodo" required>
                        <option value="">Selecione um período</option>
                        <option value="Matutino" {{ old('periodo') == 'Matutino' ? 'selected' : '' }}>Matutino</option>
                        <option value="Vespertino" {{ old('periodo') == 'Vespertino' ? 'selected' : '' }}>Vespertino</option>
                        <option value="Noturno" {{ old('periodo') == 'Noturno' ? 'selected' : '' }}>Noturno</option>
                        <option value="Integral" {{ old('periodo') == 'Integral' ? 'selected' : '' }}>Integral</option>
                    </select>
                    @error('periodo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="vagas" class="form-label">Número de Vagas</label>
                    <input type="number" class="form-control @error('vagas') is-invalid @enderror" id="vagas" name="vagas" value="{{ old('vagas') }}" required min="1">
                    @error('vagas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6">
                    <label for="curso_id" class="form-label">Curso</label>
                    <select class="form-select @error('curso_id') is-invalid @enderror" id="curso_id" name="curso_id" required>
                        <option value="">Selecione um curso</option>
                        @foreach($cursos ?? [] as $curso)
                            <option value="{{ $curso->id }}" {{ old('curso_id') == $curso->id ? 'selected' : '' }}>
                                {{ $curso->nome }}
                            </option>
                        @endforeach
                    </select>
                    @error('curso_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea class="form-control @error('descricao') is-invalid @enderror" id="descricao" name="descricao" rows="4">{{ old('descricao') }}</textarea>
                    @error('descricao')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Salvar
                </button>
                <a href="{{ route('turmas.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
