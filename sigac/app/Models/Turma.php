<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Role;
use App\Models\Aluno;
use App\Models\Curso;

class Turma extends Model
{
    use SoftDeletes;

    protected $table = 'turmas';
    protected $fillable = [
        'nome',
        'descricao',
        'data_inicio',
        'data_fim',
        'curso_id'
    ];

    protected $dates = ['deleted_at', 'data_inicio', 'data_fim'];

    // Relacionamentos
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function alunos()
    {
        return $this->hasMany(Aluno::class);
    }
}
