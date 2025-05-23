<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Role;
use App\Models\Aluno;
use App\Models\Documento;

class Comprovante extends Model
{
    use SoftDeletes;

    protected $table = 'comprovantes';
    protected $fillable = [
        'titulo',
        'descricao',
        'arquivo',
        'data_emissao',
        'aluno_id',
        'documento_id'
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

    public function documento()
    {
        return $this->belongsTo(Documento::class);
    }
}
