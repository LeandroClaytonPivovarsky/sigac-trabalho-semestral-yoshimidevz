<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $table = 'roles';
    protected $fillable = [
        'nome',
        'descricao',
    ];

    // Relacionamentos
    public function alunos()
    {
        return $this->belongsToMany(Aluno::class)->withTimestamps();
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class)->withTimestamps();
    }

    public function comprovantes()
    {
        return $this->belongsToMany(Comprovante::class)->withTimestamps();
    }

    public function cursos()
    {
        return $this->belongsToMany(Curso::class)->withTimestamps();
    }

    public function declaracoes()
    {
        return $this->belongsToMany(Declaracao::class)->withTimestamps();
    }

    public function documentos()
    {
        return $this->belongsToMany(Documento::class)->withTimestamps();
    }

    public function niveis()
    {
        return $this->belongsToMany(Nivel::class)->withTimestamps();
    }

    public function turmas()
    {
        return $this->belongsToMany(Turma::class)->withTimestamps();
    }
}
