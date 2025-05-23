@extends('layouts.app')

@section('title', 'Criar Comprovante')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">Criar Novo Comprovante</h1>
    <a href="{{ route('comprovantes.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Voltar
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Formulário de Cadastro</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('comprovantes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" class="form-control @error('titulo') is-invalid @enderror" id="titulo" name="titulo" value="{{ old('titulo') }}" required>
                    @error('titulo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6">
                    <label for="data_emissao" class="form-label">Data de Emissão</label>
                    <input type="date" class="form-control @error('data_emissao') is-invalid @enderror" id="data_emissao" name="data_emissao" value="{{ old('data_emissao') }}" required>
                    @error('data_emissao')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea class="form-control @error('descricao') is-invalid @enderror" id="descricao" name="descricao" rows="3">{{ old('descricao') }}</textarea>
                    @error('descricao')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="aluno_id" class="form-label">Aluno</label>
                    <select class="form-select @error('aluno_id') is-invalid @enderror" id="aluno_id" name="aluno_id" required>
                        <option value="">Selecione um aluno</option>
                        @foreach($alunos ?? [] as $aluno)
                            <option value="{{ $aluno->id }}" {{ old('aluno_id') == $aluno->id ? 'selected' : '' }}>
                                {{ $aluno->nome }}
                            </option>
                        @endforeach
                    </select>
                    @error('aluno_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6">
                    <label for="documento_id" class="form-label">Documento</label>
                    <select class="form-select @error('documento_id') is-invalid @enderror" id="documento_id" name="documento_id" required>
                        <option value="">Selecione um documento</option>
                        @foreach($documentos ?? [] as $documento)
                            <option value="{{ $documento->id }}" {{ old('documento_id') == $documento->id ? 'selected' : '' }}>
                                {{ $documento->titulo }}
                            </option>
                        @endforeach
                    </select>
                    @error('documento_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="arquivo" class="form-label">Arquivo</label>
                    <input type="file" class="form-control @error('arquivo') is-invalid @enderror" id="arquivo" name="arquivo" required>
                    @error('arquivo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">Formatos aceitos: PDF, DOC, DOCX, JPG, JPEG, PNG</div>
                </div>
            </div>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Salvar
                </button>
                <a href="{{ route('comprovantes.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
