@extends('layouts.app')

@section('title', 'Editar Aluno')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2">Editar Aluno</h1>
    <a href="{{ route('alunos.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Voltar
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Formulário de Edição</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('alunos.update', $aluno->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nome" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome', $aluno->nome) }}" required maxlength="150">
                    @error('nome')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control @error('cpf') is-invalid @enderror" id="cpf" name="cpf" value="{{ old('cpf', $aluno->cpf) }}" required maxlength="11">
                    @error('cpf')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $aluno->email) }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6">
                    <label for="senha" class="form-label">Senha (deixe em branco para manter a atual)</label>
                    <input type="password" class="form-control @error('senha') is-invalid @enderror" id="senha" name="senha" minlength="6">
                    @error('senha')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="curso_id" class="form-label">Curso</label>
                    <select class="form-select @error('curso_id') is-invalid @enderror" id="curso_id" name="curso_id" required>
                        <option value="">Selecione um curso</option>
                        @foreach($cursos ?? [] as $curso)
                            <option value="{{ $curso->id }}" {{ old('curso_id', $aluno->curso_id) == $curso->id ? 'selected' : '' }}>
                                {{ $curso->nome }}
                            </option>
                        @endforeach
                    </select>
                    @error('curso_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6">
                    <label for="turma_id" class="form-label">Turma</label>
                    <select class="form-select @error('turma_id') is-invalid @enderror" id="turma_id" name="turma_id" required>
                        <option value="">Selecione uma turma</option>
                        @foreach($turmas ?? [] as $turma)
                            <option value="{{ $turma->id }}" {{ old('turma_id', $aluno->turma_id) == $turma->id ? 'selected' : '' }}>
                                {{ $turma->nome }}
                            </option>
                        @endforeach
                    </select>
                    @error('turma_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="user_id" class="form-label">Usuário</label>
                    <select class="form-select @error('user_id') is-invalid @enderror" id="user_id" name="user_id" required>
                        <option value="">Selecione um usuário</option>
                        @foreach($users ?? [] as $user)
                            <option value="{{ $user->id }}" {{ old('user_id', $aluno->user_id) == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Atualizar
                </button>
                <a href="{{ route('alunos.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Máscara para CPF
        $('#cpf').on('input', function() {
            let value = $(this).val().replace(/\D/g, '');
            if (value.length > 11) {
                value = value.substring(0, 11);
            }
            $(this).val(value);
        });
    });
</script>
@endsection
