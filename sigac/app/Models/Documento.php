<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Role;
use App\Models\Aluno;
use App\Models\Categoria;
use App\Models\Comprovante;

class Documento extends Model
{
    use SoftDeletes;

    protected $table = 'documentos';
    protected $fillable = [
        'titulo',
        'descricao',
        'arquivo',
        'data_emissao',
        'aluno_id',
        'categoria_id'
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

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function comprovantes()
    {
        return $this->hasMany(Comprovante::class);
    }
}
