<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Role;
use App\Models\Aluno;

class Declaracao extends Model
{
    use SoftDeletes;

    protected $table = 'declaracoes';
    protected $fillable = [
        'titulo',
        'descricao',
        'conteudo',
        'data_emissao',
        'aluno_id'
    ];

    protected $dates = ['deleted_at', 'data_emissao'];

    // Relacionamentos
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
}
