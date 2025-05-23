<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Role;
use App\Models\Curso;
use App\Models\Turma;
use App\Models\User;

class Aluno extends Model
{
    use SoftDeletes;

    protected $table = 'alunos';
    protected $fillable = [
        'nome',
        'cpf',
        'email',
        'senha',
        'curso_id',
        'turma_id',
        'user_id'
    ];

    protected $dates = ['deleted_at'];

    // Relacionamentos
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function documentos()
    {
        return $this->hasMany(Documento::class);
    }

    public function comprovantes()
    {
        return $this->hasMany(Comprovante::class);
    }

    public function declaracoes()
    {
        return $this->hasMany(Declaracao::class);
    }
}
