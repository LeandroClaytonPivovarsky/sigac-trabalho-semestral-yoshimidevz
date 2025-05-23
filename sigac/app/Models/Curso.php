<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Role;
use App\Models\Aluno;
use App\Models\Categoria;
use App\Models\Nivel;
use App\Models\Turma;

class Curso extends Model
{
    use SoftDeletes;

    protected $table = 'cursos';
    protected $fillable = [
        'nome',
        'descricao',
        'carga_horaria',
        'categoria_id',
        'nivel_id'
    ];

    protected $dates = ['deleted_at'];

    // Relacionamentos
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function nivel()
    {
        return $this->belongsTo(Nivel::class);
    }

    public function alunos()
    {
        return $this->hasMany(Aluno::class);
    }

    public function turmas()
    {
        return $this->hasMany(Turma::class);
    }
}
